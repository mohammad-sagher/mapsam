<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    //
    public function ShowLogin(){
        return view('admin.auth.login');
    }
    public function Login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt($request->only('email','password'))){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error','Invalid credentials');
    }
    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.ShowLogin');
    }
}
