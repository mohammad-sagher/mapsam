<?php

namespace App\Http\Controllers\admin\accountant;
use App\Models\Accountant;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcountantBrofileController extends Controller
{
    public static function createProfile(Accountant $accountant){
       $profile=Profile::create([

        'username'=>$accountant->name,
        'phone'=>$accountant->phone,
        'address'=>$accountant->address,

       ]);
       $accountant->profile_id=$profile->id;
       $accountant->save();
    


    }
    //
}
