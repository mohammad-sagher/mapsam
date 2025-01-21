<?php

namespace App\Http\Controllers\admin\auth;
use App\Models\Admin;
use App\Http\Requests\Admin\AdminRegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminRegisterController extends Controller
{
    //
    public function ShowRegister(){
        return view('admin.auth.register');
    }
    public function Register(AdminRegisterRequest $request){
        $admin_key = 'admin123';

      $request->validated();
      if($request->admin_key == $admin_key){
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.ShowLogin')->with('success','Admin created successfully');
      }else{
        return redirect()->back()->with('error','Admin key is incorrect');
      }


    }
}
