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


Auth::routes();

Route::get('/','Web\HomeController@index');
Route::resource('/form', 'Web\ManagementController');
// Route::get('/dashboard', 'ManagementController@index');

// Route::post('/form','ManagementController@store');
// Route::get('/form','ManagementController@create');
// Route::delete('/user/{id}', 'ManagementController@index');
