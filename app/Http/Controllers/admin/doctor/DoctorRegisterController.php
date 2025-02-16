<?php

namespace App\Http\Controllers\admin\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\doctor\DoctorRegisterRequest;
use App\Models\Doctor;
use App\Models\Specialization;
class DoctorRegisterController extends Controller
{
    //
    public function ShowRegister(){
        $specializations = Specialization::all();
      return view('admin.informationDoctor.register',compact('specializations'));
    }
    public function Register(DoctorRegisterRequest $request){


        $doctor= Doctor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,


        ]);
        if ($request->has('speciality') && is_array($request->speciality)) {
            $doctor->specializations()->attach($request->speciality);
        }
        DoctorProfileControllerByAdmin::createProfile($doctor);
        $doctor->images()->createOrFirst(['imageable_id'=>$doctor->id],[
            'url' => 'defult.jpg',
           ]);

        return redirect()->route('admin.dashboard')->with('success','Doctor registered successfully and profile created');
    }
}
