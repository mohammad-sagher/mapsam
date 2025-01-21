<?php
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\admin\doctor\InformationDoctorController;
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
Route::get('/adminDashboard',function(){
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');


  Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/admin/doctor/information',[InformationDoctorController::class,'index'])->name('doctor.information');
  });
























require __DIR__.'/auth.php';
require __DIR__.'/web.php';
