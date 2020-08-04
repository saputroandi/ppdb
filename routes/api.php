<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route:: post('/login','AuthController@login');
Route:: post('/register','AuthController@register');

Route::group(['middleware'=>'auth.jwt'],function(){
    Route:: post('/store-form','FormsController@storeForm');
    Route:: post('/update-form','FormsController@updateForm');
    Route:: get('/user-form/{id}','FormsController@userForm');
    // Route::get('/Form','UsersController@index');
    Route:: get('/logout','AuthController@logout');
});
