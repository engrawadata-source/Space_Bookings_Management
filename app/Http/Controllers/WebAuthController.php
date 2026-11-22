<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\services\WebAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
     public function __construct(protected WebAuthService $webAuthService) {}

##login
    public function loginForm(Request $request)
    {
        if (Auth::check()) {

        if (in_array(Auth::user()->type, ['super_admin', 'employee'])) {
            return redirect()->route('dashboard');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

        return view('auth.login');
    }


 public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $login = $this->webAuthService->login($credentials);

        if ($login) {

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password'
        ])->onlyInput('email');
    }



        public function logout(Request $request){
     $logout = $this->webAuthService->logout();

     if($logout){

        $request->session()->invalidate(); ##delete session's data & create new id for it
        $request->session()->regenerateToken(); ##new csrd token
        return redirect()->route('login.form');
    }

    }

}



