<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing');

//Login
Route::get('/account/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::get('/account/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::POST('/account/set_password', [App\Http\Controllers\CustomAuth::class, 'set_password'])->name('set.password');
Route::POST('/account/login/cek_login', [App\Http\Controllers\CustomAuth::class, 'customLogin'])->name('custom.login');

//GET ADMIN
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/appointment', [App\Http\Controllers\AdminController::class, 'appointment'])->name('admin.appointment');

//JSON
Route::get('/admin/appointment/json', [App\Http\Controllers\AppointmentController::class, 'json']);

//FIND
Route::get('/admin/appointment/find/{id}', [App\Http\Controllers\AppointmentController::class, 'find']);

//Robot
Route::get('/robot/notif/json/{id}', [App\Http\Controllers\NotifLoader::class, 'read']);
Route::get('/robot/notif/get', [App\Http\Controllers\NotifLoader::class, 'get_notif']);
Route::get('/robot/notif/test', [App\Http\Controllers\NotifLoader::class, 'test']);
