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

//Robot


Route::get('/robot/notif/json/{id}', [App\Http\Controllers\NotifLoader::class, 'read']);
Route::get('/robot/notif/get', [App\Http\Controllers\NotifLoader::class, 'get_notif']);
Route::get('/robot/notif/test', [App\Http\Controllers\NotifLoader::class, 'test']);
