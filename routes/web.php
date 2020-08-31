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

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'news',
    ],function(){
    Route:: post('/input','Web\NewsController@storeNews');
    Route:: get('/show','Web\NewsController@showAllNews');
    Route:: get('/show/{id}/edit','Web\NewsController@editNews');
    Route:: get('/input','Web\NewsController@inputNews');
    Route:: patch('/update/{id}','Web\NewsController@updateNews');
    Route:: delete('/delete/{id}','Web\NewsController@deleteNews');
});

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'payment',
    ],function(){
    Route:: post('/input','Web\PaymentConfirmationController@storePaymentConfirmation');
    Route:: get('/show','Web\PaymentConfirmationController@showAllPaymentConfirmation');
    Route:: get('/show/{id}','Web\PaymentConfirmationController@showPaymentConfirmation');
    Route:: get('/show/{id}/edit','Web\PaymentConfirmationController@editPaymentConfirmation');
    Route:: get('/input','Web\PaymentConfirmationController@inputPaymentConfirmation');
    Route:: patch('/update/{id}','Web\PaymentConfirmationController@updatePaymentConfirmation');
    Route:: delete('/delete/{id}','Web\PaymentConfirmationController@deletePaymentConfirmation');
    // Route:: get('/test','Web\PaymentConfirmationController@verificationPaymentConfirmation');
});

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'payment-details',
    ],function(){
    Route:: post('/input','Web\PaymentDetailsController@storePaymentDetails');
    Route:: get('/show','Web\PaymentDetailsController@showAllPaymentDetails');
    Route:: get('/show/{id}/edit','Web\PaymentDetailsController@editPaymentDetails');
    Route:: get('/input','Web\PaymentDetailsController@inputPaymentDetails');
    Route:: patch('/update/{id}','Web\PaymentDetailsController@updatePaymentDetails');
    Route:: delete('/delete/{id}','Web\PaymentDetailsController@deletePaymentDetails');
});
Route::group([
    'middleware' => 'auth',
    'prefix'     => 'schedule',
    ],function(){
    Route:: post('/input','Web\ScheduleController@storeSchedule');
    Route:: get('/show','Web\ScheduleController@showAllSchedule');
    Route:: get('/show/{id}/edit','Web\ScheduleController@editSchedule');
    Route:: get('/input','Web\ScheduleController@inputSchedule');
    Route:: patch('/update/{id}','Web\ScheduleController@updateSchedule');
    Route:: delete('/delete/{id}','Web\ScheduleController@deleteSchedule');
});
