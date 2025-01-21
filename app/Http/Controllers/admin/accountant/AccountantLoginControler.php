<?php

namespace App\Http\Controllers\admin\accountant;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\accountant\AccountantLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountantLoginControler extends Controller
{
    //
    public function ShowLogin(){
        return view('accountant.auth.login');
    }
    public function Login(AccountantLoginRequest $request){


        if (Auth::guard('accountant')->attempt($request->only('email', 'password'))) {
            return redirect()->route('accountant.dashboard');
        }


        return redirect()->back()->with('error','Invalid credentials');
    }


    public function Logout(){
        Auth::guard('accountant')->logout();
        return redirect()->route('accountant.Login');
    }
}

