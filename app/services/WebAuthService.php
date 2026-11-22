<?php

namespace App\services;

use Illuminate\Support\Facades\Auth;

class WebAuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}
    public function login(array $credentials)
    {
        $credentials['type'] = ['super_admin', 'employee'];
        return Auth::attempt($credentials);
    }

     public function logout(){
       Auth::logout();
        return true;
        }

}
