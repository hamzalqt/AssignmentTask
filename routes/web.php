<?php

use App\Http\Controllers\Auth\admin\login;
use App\Http\Controllers\Auth\logout;
use App\Http\Controllers\Auth\superAdmin\login as SuperAdminLogin;
use App\Http\Controllers\HeadquarterController;
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
use App\Http\Controllers\LocationController;
use App\Http\Controllers\masterTemplate\createMaterTemplate;
use App\Http\Controllers\masterTemplate\deleteMasterTemplate;
use App\Http\Controllers\masterTemplate\getMasterTemplate;
use App\Http\Controllers\masterTemplate\updateMastertemplate;
use App\Http\Controllers\MasterTemplateController;
use App\Http\Controllers\pages\createUser;
use App\Http\Controllers\pages\deleteUser;
use App\Http\Controllers\pages\getUser;
use App\Http\Controllers\pages\manageUsers;
use App\Http\Controllers\pages\updateUser;
use App\Http\Controllers\template\createTemplateController;
use App\Http\Controllers\template\deleteController;
use App\Http\Controllers\template\getTemplateController;
use App\Http\Controllers\template\index;
use App\Http\Controllers\template\masterController;
use App\Http\Controllers\template\updateController as TemplateUpdateController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
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
Route::get('/mastertemplates', function () {
    return view('tool.master');
})->name('master');

Route::get('/templates/{id}/headquarter',[index::class,'redirect'])->name('template');

Route::post('/admin/login',[login::class,'login'])->name('adminLogin');
Route::post('/super-admin/login',[SuperAdminLogin::class,'login'])->name('super-adminLogin');

Route::post('/logout',[logout::class,'logout'])->name('logout');

Route::get('/manage/users',[manageUsers::class,'index'])
->middleware('auth')->name('manageUsers');
// Route::get('/get/user/{id}',[getUser::class,'getUser']);
// Route::put('/update/user',[updateUser::class,'update']);
// Route::delete('/delete/user/{id}',[deleteUser::class,'delete']);
// Route::post('/create/user',[createUser::class,'create']);
Route::get('/headQuarter',[show::class,'show'])->name('headQuarter');
// Route::post('headQuarter/create',[createHQ::class,'create']);
// Route::get('/get/hq/{id}',[getHq::class,'getHq']);
// Route::put('headQuarter/update',[updateHq::class,'update']);
// Route::delete('headQuarter/delete/{id}',[delete::class,'delete']);
// Route::put('/template/to/master/{id}',[masterController::class,'toggleToMaster']);
Route::put('/master/to/template/{id}',[masterController::class,'toggleToTemplate']);


Route::get('get/location',[LocationShow::class,'show'])->name('locations');
// Route::post('create/loc',[create::class,'createLocation']);
// Route::delete('location/delete/{id}',[LocationDelete::class,'deleteLoc']);
// Route::put('location/update',[updateController::class,'update']);
// Route::get('get/loc/{id}',[getLocController::class,'getLoc']);

// Route::post('template/create',[createTemplateController::class,'create']);
// Route::get('template/get',[getTemplateController::class,'getTemplate']);
// Route::get('template/get/master',[getTemplateController::class,'getTemplateMaster']);
// Route::get('get/template/{id}',[getTemplateController::class,'getTemplateById']);
// Route::put('/update/template/{id}',[TemplateUpdateController::class,'update']);
// Route::delete('delete/template/{id}',[deleteController::class,'delete']);


// // Route::get('templates/{id}',[getTemplateController::class,'getTemplatesByHeadquarter']);
// Route::get('get/master/template/{id}',[getMasterTemplate::class,'getTemplate']);
// Route::get('/master/templates',[getMasterTemplate::class,'getAllMasterTemplates']);
// Route::post('master/template/create',[createMaterTemplate::class,'create']);
// Route::get('master/{id}/template',[updateMastertemplate::class,'edit']);
// Route::put('update/{id}/master',[updateMastertemplate::class,'update']);
// Route::delete('delete/{id}/master',[deleteMasterTemplate::class,'delete']);




Route::resource('users', UserController::class);
Route::resource('headquarters', HeadquarterController::class);
Route::resource('locations', LocationController::class);
Route::resource('templates', TemplateController::class);
Route::resource('master-templates', MasterTemplateController::class);


