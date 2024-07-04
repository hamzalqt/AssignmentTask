<?php

use App\Http\Controllers\Auth\admin\login;
use App\Http\Controllers\Auth\logout;
use App\Http\Controllers\Auth\superAdmin\login as SuperAdminLogin;
use App\Http\Controllers\headquarters\createHQ;
use App\Http\Controllers\headquarters\delete;
use App\Http\Controllers\headquarters\getHq;
use App\Http\Controllers\headquarters\show;
use App\Http\Controllers\headquarters\updateHq;
use App\Http\Controllers\location\create;
use App\Http\Controllers\location\delete as LocationDelete;
use App\Http\Controllers\location\getLocController;
use App\Http\Controllers\location\show as LocationShow;
use App\Http\Controllers\location\updateController;
use App\Http\Controllers\pages\createUser;
use App\Http\Controllers\pages\deleteUser;
use App\Http\Controllers\pages\getUser;
use App\Http\Controllers\pages\manageUsers;
use App\Http\Controllers\pages\updateUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
})->middleware('guest')->name('admin');

Route::get('/super-admin', function () {
    return view('Auth.superAdmin.login');
})->middleware('guest')->name('super-admin');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');
Route::get('/401', function () {
    return view('Pages.401');
})->name('welcome');


Route::post('/admin/login',[login::class,'login'])->name('adminLogin');
Route::post('/super-admin/login',[SuperAdminLogin::class,'login'])->name('super-adminLogin');

Route::post('/logout',[logout::class,'logout'])->name('logout');

Route::get('/manage/users',[manageUsers::class,'index'])
->middleware('auth')->name('manageUsers');
Route::get('/get/user/{id}',[getUser::class,'getUser']);
Route::put('/update/user',[updateUser::class,'update']);
Route::delete('/delete/user/{id}',[deleteUser::class,'delete']);
Route::post('/create/user',[createUser::class,'create']);
Route::get('/headQuarter',[show::class,'show'])->name('headQuarter');
Route::post('headQuarter/create',[createHQ::class,'create']);
Route::get('/get/hq/{id}',[getHq::class,'getHq']);
Route::put('headQuarter/update',[updateHq::class,'update']);
Route::delete('headQuarter/delete/{id}',[delete::class,'delete']);


Route::get('get/location',[LocationShow::class,'show'])->name('locations');
Route::post('create/loc',[create::class,'createLocation']);
Route::delete('location/delete/{id}',[LocationDelete::class,'deleteLoc']);
Route::put('location/update',[updateController::class,'update']);
Route::get('get/loc/{id}',[getLocController::class,'getLoc']);
