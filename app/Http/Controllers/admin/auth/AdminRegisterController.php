<?php

namespace App\Http\Controllers\admin\auth;
use App\Models\Admin;
use App\Http\Requests\Admin\AdminRegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
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
        $admin=Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
        $this->createProfileAdmin($admin);
        return redirect()->route('admin.ShowLogin')->with('success','Admin created successfully and profile created');
      }else{
        return redirect()->back()->with('error','Admin key is incorrect');
      }



    }
    public static function createProfileAdmin(Admin $admin){
        $profile=Profile::create([
            'username'=>$admin->name,
            'phone'=>$admin->phone,
            'address'=>$admin->address,
        ]);
        $admin->profile_id=$profile->id;
        $admin->save();
    }
}
