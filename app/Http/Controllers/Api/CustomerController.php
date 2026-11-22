<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\services\CustomerService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterCustomerRequest;


//use Illuminate\Http\Request;

class CustomerController extends Controller
{

public function __construct(protected CustomerService $customerService){}



public function register(RegisterCustomerRequest $request){
       $customer= $this->customerService->register($request->validated());
 return response()->json([
        'message' => 'Registered successfully',
        'data' =>$customer
    ], 201);
}


public function login(LoginRequest $request){
    $customer=$this->customerService->login($request->validated());

    if (!$customer) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    return response()->json([
        'message'=> 'logged in successfully' ,
        'data'=> $customer
    ] , 200);

}


public function logout()
{
    $this->customerService->logout();

    return response()->json([
        'message' => 'Logged out successfully'
    ], 200);
}

public function myProfile()
{
    $user = $this->customerService->myProfile();

    return response()->json([
        'message' => 'Customer profile retrieved successfully',
        'data' => $user
    ], 200);
}

}




