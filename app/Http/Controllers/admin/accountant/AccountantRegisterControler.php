<?php

namespace App\Http\Controllers\admin\accountant;

use App\Models\Accountant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\accountant\AccountantRegisterRequest;
use Illuminate\Http\Request;

class AccountantRegisterControler extends Controller
{
    //
    public function ShowRegister(){
        return view('admin.informationAccountant.register');
    }
    public function Register(AccountantRegisterRequest $request){

      $accountant=  Accountant::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
        //create profile
        AcountantBrofileController::createProfile($accountant);
        return redirect()->route('admin.dashboard')->with('success','Accountant registered successfully');
    }
}


