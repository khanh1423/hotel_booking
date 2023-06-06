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

// Route::get('/', function () {
//     return view('administator.modules.master');
// });

Route::get('/login', 'LoginController@formLogin')->name('formLogin');
Route::post('/login', 'LoginController@checkLogin')->name('checkLogin');
Route::get('/logout', 'LoginController@logout')->name('logout');