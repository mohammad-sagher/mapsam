<?php

namespace App\Http\Controllers\admin\doctor;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\doctor\DoctorLoginRequest;
use Illuminate\Http\Request;

class DoctorLoginController extends Controller
{
    //
    public function ShowLogin(){
        return view('doctors.auth.login');
    }
    public function login(DoctorLoginRequest $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::guard('doctor')->attempt($request->only('email','password'))){
            return redirect()->route('doctor.dashboard');
        }
        return redirect()->back()->with('error','Invalid credentials');
    }
    public function Logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.ShowLogin');
    }

}
