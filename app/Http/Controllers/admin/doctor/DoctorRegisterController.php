<?php

namespace App\Http\Controllers\admin\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\doctor\DoctorRegisterRequest;
use App\Models\Doctor;
class DoctorRegisterController extends Controller
{
    //
    public function ShowRegister(){
      return view('admin.informationDoctor.register');
    }
    public function Register(DoctorRegisterRequest $request){


        Doctor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
            'speciality'=>$request->speciality,

        ]);
        return redirect()->route('admin.dashboard')->with('success','Doctor registered successfully');
    }
}
