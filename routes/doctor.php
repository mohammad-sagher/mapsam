<?php

use App\Http\Controllers\admin\doctor\DoctorLoginController;

use App\Http\Controllers\admin\doctor\DoctorRegisterController;
use App\Http\Controllers\doctor\DoctorProfileCountroller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocailiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\PorifileDataController;
use App\Http\Controllers\DoctorController;

use Illuminate\Support\Facades\Route;
//check guard
Route::get('/guard', function () {
    $currentGuard = null;

    foreach (array_keys(config('auth.guards')) as $guard) {
        if (auth()->guard($guard)->check()) {
            $currentGuard = $guard;
            break;
        }

    }

    return $currentGuard;

});


Route::group(['prefix'=>'doctor','as'=>'doctor.'],function(){



    Route::get('/login',[DoctorLoginController::class,'ShowLogin'])->name('ShowLogin')->middleware('guest:doctor');

    Route::post('/login',[DoctorLoginController::class,'login'])->name('Login')->middleware('guest:doctor');

    //doctor register by admin
    Route::get('/register',[DoctorRegisterController::class,'ShowRegister'])->name('ShowRegister')->middleware('auth:admin');

    Route::post('/register',[DoctorRegisterController::class,'Register'])->name('Register')->middleware('auth:admin');

//doctor logout
Route::post('/logout',[DoctorLoginController::class,'logout'])->name('logout')->middleware('auth:doctor');
});


Route::group(['prefix'=>'doctor','as'=>'doctor.'],function(){
    Route::get('/profile',[DoctorProfileCountroller::class,'ShowProfile'])->name('profile')->middleware('auth:doctor');
    Route::put('/profile',[DoctorProfileCountroller::class,'updateActivity'])->name('updateActivity')->middleware('auth:doctor');
    Route::put('/profile/password',[DoctorProfileCountroller::class,'updatePassword'])->name('updatePassword')->middleware('auth:doctor');
    Route::put('/profile/data',[DoctorProfileCountroller::class,'updateData'])->name('updateData')->middleware('auth:doctor');
    Route::put('/profile/image',[DoctorProfileCountroller::class,'updateImage'])->name('updateImage')->middleware('auth:doctor');

});



    Route::get('/doctorDashboard',function(){
        return view('doctors.index');
    })->name('doctor.dashboard')->middleware('auth:doctor');


    Route::get('/testimage', function () {
        if(auth()->guard('doctor')->check()){
            $doctor=Auth::guard('doctor')->user()->images;
            dd($doctor);
        }
        if(auth()->guard('admin')->check()){
            $admin=Auth::guard('admin')->user()->images;
            dd($admin->first()->url);
        }


    });
