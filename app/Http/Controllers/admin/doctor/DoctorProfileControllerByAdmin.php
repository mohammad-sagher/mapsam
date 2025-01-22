<?php

namespace App\Http\Controllers\admin\doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Profile;
use Illuminate\Http\Request;


class DoctorProfileControllerByAdmin extends Controller
{
    //
    public static function createProfile(Doctor $doctor){
        $profile=Profile::create([

         'username'=>$doctor->name,
         'phone'=>$doctor->phone,
         'address'=>$doctor->address,

        ]);
        $doctor->profile_id=$profile->id;
        $doctor->save();



     }
}
