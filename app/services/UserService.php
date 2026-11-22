<?php

namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

##create user
    public function store(array $data){
       $user = User::query()->create([
          'name'=>$data['name'],
          'email'=>$data['email'],
          'password'=>$data['password'] ,
          'phone_number'=>$data['phone_number'],
          'address'=>$data['address'],
          'type'=>$data['type']
          ]);
          return $user;

    }

    ##update user
    public function update($id, array $data)
{
    $user = User::find($id);
    $user->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone_number' => $data['phone_number'],
        'address' => $data['address']
    ]);
     if (!empty($data['password'])) {
        $user->update([
            'password' => Hash::make($data['password'])
        ]);
     }

    return $user;
}


##get all users
// public function index(){
//     $users =  User::query()->get();
//     return $users ;
// }
}
