<?php
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\admin\accountant\AccountantLoginControler;
use App\Http\Controllers\admin\accountant\AccountantRegisterControler;
use App\Http\Controllers\accountant\AcountantProfileController;
use Illuminate\Support\Facades\Route;

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
//accountant login
Route::get('testAccountant',function(){
    return "testAccountant";
});

Route::group(['prefix'=>'accountant','as'=>'accountant.'],function(){
    Route::get('/auth/login',[AccountantLoginControler::class,'ShowLogin'])->name('ShowLogin')->middleware('guest:accountant');
    Route::post('/auth/login',[AccountantLoginControler::class,'Login'])->name('Login')->middleware('guest:accountant');

    Route::get('/auth/register',[AccountantRegisterControler::class,'ShowRegister'])->name('ShowRegister')->middleware('auth:admin');
    Route::post('/auth/register',[AccountantRegisterControler::class,'Register'])->name('Register')->middleware('auth:admin');
    Route::post('/auth/logout',[AccountantLoginControler::class,'Logout'])->name('Logout');




  //profile
  Route::prefix('profile')->group(function(){
    Route::get('/',[AcountantProfileController::class,'ShowProfile'])
                   ->name('ShowProfile');

    Route::put('/activity',[AcountantProfileController::class,'updateActivity'])
                    ->name('updateActivity');

    Route::put('/data',[AcountantProfileController::class,'updateData'])
                    ->name('updateData');

    Route::put('/password',[AcountantProfileController::class,'updatePassword'])
           ->name('updatePassword');

    Route::put('/image',[AcountantProfileController::class,'updateImage'])
           ->name('updateImage');

  })->middleware('auth:accountant');

});


Route::get('/accountantDashboard',function (){
    return view('accountant.index');
})->name('accountant.dashboard')->middleware('auth:accountant');






















require __DIR__.'/auth.php';
require __DIR__.'/web.php';
