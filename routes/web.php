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
Route::resource('/forms', 'Web\FormsController');

//kurang update grade dan store grade

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'grade',
    ],function(){
    Route:: post('/store','Web\GradeController@storeGrade');
    Route:: get('/show','Web\GradeController@showAllGrade');
    Route:: get('/show/{id}','Web\GradeController@showGrade');
    Route:: get('/show/{id}/edit','Web\GradeController@editGrade');
    Route:: get('/input','Web\GradeController@inputGrade');
    Route:: patch('/update/{id}','Web\GradeController@updateGrade');
    Route:: delete('/delete/{id}','Web\GradeController@deleteGrade');
});
