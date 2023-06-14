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
Route::middleware('check_login')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('attribute', 'AttributeController');
    Route::resource('roomtype', 'RoomTypeController');
    Route::resource('room', 'RoomController');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
});