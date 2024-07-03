<?php

use App\Http\Controllers\Auth\admin\login;
use App\Http\Controllers\Auth\logout;
use App\Http\Controllers\Auth\superAdmin\login as SuperAdminLogin;
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

