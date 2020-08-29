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
    Route:: post('/input','Web\GradeController@storeGrade');
    Route:: get('/show','Web\GradeController@showAllGrade');
    Route:: get('/show/{id}','Web\GradeController@showGrade');
    Route:: get('/show/{id}/edit','Web\GradeController@editGrade');
    Route:: get('/input','Web\GradeController@inputGrade');
    Route:: patch('/update/{id}','Web\GradeController@updateGrade');
});
Route::group([
    'middleware' => 'auth',
    'prefix'     => 'document',
    ],function(){
    Route:: post('/input','Web\DocumentController@storeDocument');
    Route:: get('/show','Web\DocumentController@showAllDocument');
    Route:: get('/show/{id}','Web\DocumentController@showDocument');
    Route:: get('/show/{id}/edit','Web\DocumentController@editDocument');
    Route:: get('/input','Web\DocumentController@inputDocument');
    Route:: patch('/update/{id}','Web\DocumentController@updateDocument');
});

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'interest',
    ],function(){
    Route:: post('/input','Web\MajorInterestController@storeInterest');
    Route:: get('/show','Web\MajorInterestController@showAllInterest');
    Route:: get('/show/{id}/edit','Web\MajorInterestController@editInterest');
    Route:: get('/input','Web\MajorInterestController@inputInterest');
    Route:: patch('/update/{id}','Web\MajorInterestController@updateInterest');
    Route:: delete('/delete/{id}','Web\MajorInterestController@deleteInterest');
});
