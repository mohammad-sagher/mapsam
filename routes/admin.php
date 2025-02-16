<?php
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\admin\doctor\InformationDoctorController;
use App\Http\Controllers\admin\profile\AdminProfileController;
use App\Http\Controllers\admin\doctor\SpecializationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocailiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\PorifileDataController;
use App\Http\Controllers\DoctorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//admin login
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){

        Route::get('/auth/login',[AdminLoginController::class,'ShowLogin'])->name('ShowLogin')->middleware('guest:admin');
        Route::post('/auth/login',[AdminLoginController::class,'login'])->name('login')->middleware('guest:admin');
    //admin register
         Route::get('/auth/register',[AdminRegisterController::class,'ShowRegister'])->name('ShowRegister')->middleware('guest:admin');

        Route::post('/auth/register',[AdminRegisterController::class,'register'])->name('register')->middleware('guest:admin');
     //admin logout
        Route::post('/auth/logout',[AdminLoginController::class,'Logout'])->name('logout')->middleware('auth:admin');
});
 Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/profile/show',[AdminProfileController::class,'ShowProfile'])->name('profile.show')->middleware('auth:admin');
    Route::put('/profile/updatePassword',[AdminProfileController::class,'updatePassword'])->name('updatePassword')->middleware('auth:admin');
    Route::put('/profile/updateData',[AdminProfileController::class,'updateData'])->name('updateData')->middleware('auth:admin');
    Route::put('/profile/updateActivity',[AdminProfileController::class,'updateActivity'])->name('updateActivity')->middleware('auth:admin');
    Route::put('/profile/updateImage',[AdminProfileController::class,'updateImage'])->name('updateImage')->middleware('auth:admin');
 });



 Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/doctor/specialization',[SpecializationController::class,'index'])->name('doctor.specialization.index');
    Route::get('/doctor/specialization/create',[SpecializationController::class,'create'])->name('doctor.specialization.create');
    Route::post('/doctor/specialization',[SpecializationController::class,'store'])->name('doctor.specialization.store');
    Route::get('/doctor/specialization/{specialization}/edit',[SpecializationController::class,'edit'])->name('doctor.specialization.edit');
    Route::put('/doctor/specialization/{specialization}',[SpecializationController::class,'update'])->name('doctor.specialization.update');
    Route::delete('/doctor/specialization/{specialization}',[SpecializationController::class,'destroy'])->name('doctor.specialization.destroy');

 })->middleware('auth:admin');



Route::get('/adminDashboard',function(){
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');


  Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/admin/doctor/information',[InformationDoctorController::class,'index'])->name('doctor.information');
  });
























require __DIR__.'/auth.php';
require __DIR__.'/web.php';
