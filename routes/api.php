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
Route:: get('/logout','AuthController@logout')->middleware('auth.jwt');

Route::prefix('forms')->group(['middleware'=>'auth.jwt'],function(){
    Route:: post('/store','FormsController@storeForm');
    Route:: patch('/update/{id}','FormsController@updateForm');
    Route:: get('/show/{id}','FormsController@showForm');
});

Route::prefix('grade')->group(['middleware'=>'auth.jwt'],function(){
    Route:: post('/store','GradeController@storeGrade');
    Route:: patch('/update/{id}','GradeController@updateGrade');
    Route:: get('/show/{id}','GradeController@showGrade');
});