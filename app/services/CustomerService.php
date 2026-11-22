<?php

namespace App\services;

use App\services\UserService;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected UserService $userService)
    {
    }

    public function register(array $data){
        $data['type'] = 'customer';

        $user = $this->userService->store($data);
        $customer= Customer::query()->create([
           'user_id'=>$user->id , //here we take the new id of user which created , not id from request
          'date_of_birth'=>$data['date_of_birth'],
          'gender'=>$data['gender']
        ]);
        $token = $user->createToken("myapptoken")->plainTextToken;

        return  [
                'user'=>$user,
                'customer' => $customer,
                'token' => $token
            ]; ##this array response

    }

    public function login (array $data){

       $user = User::query()->where('email', $data['email'])->first();
        if(!$user ||$user->type !== 'customer' || !Hash::check($data['password'], $user->password))

        {
            return null;
        }

        $token = $user->createToken("myapptoken")->plainTextToken;
        return [
                "user" => $user,
                "token" => $token
        ];

    }

public function logout()
{
    auth()->user()->currentAccessToken()->delete();

    return true;
}

public function myProfile()
{
    return auth()->user()->load('customer');
}
    }



















