<?php


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

Route::get('/', function () {
  return view('welcome');

})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('adminOrDoctor');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile-update', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [PorifileDataController::class, 'updateData'])->name('data.update');// update number/username/address/city/state
    Route::put('/profile/activity', [PorifileDataController::class, 'updateActivity'])->name('profile.update.activity');
    Route::view('/dashboard-profile1', 'auth.login')->name('profile');

      Route::group(['middleware' => 'auth:admin'], function(){

        Route::view('/testTable', 'section.tables')->name('tables');
        Route::view('/calendar', 'section.calendar')->name('calendar');
        Route::view('/forms', 'section.forms')->name('forms');
        Route::view('/icones', 'section.icones')->name('icones');
      });



Route::view('/test', function(){
    return 'hello';
})->name('icones')->middleware('auth');


Route::get('/auth/google', [SocailiteController::class, 'google'])->name('google');
Route::get('/auth/google/callback', [SocailiteController::class, 'googleCallback'])->name('googleCallback');

Route::get('/auth/github', [SocailiteController::class, 'github'])->name('github');
Route::get('/auth/github/callback', [SocailiteController::class, 'githubCallback'])->name('githubCallback');
require __DIR__.'/auth.php';


// Route::view('/dashboard-master', 'master')->name('dashboard');
// Route::view('/dashboard-index', 'index')->name('dashboard.index');




