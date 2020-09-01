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

Route:: post('/login','Api\AuthController@login');
Route:: post('/register','Api\AuthController@register');
Route:: get('/logout','Api\AuthController@logout')->middleware('auth.jwt');

Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'user',
    ],function(){
    Route:: patch('/update/{id}','Api\UsersController@updateUser');
    Route:: get('/show/{id}','Api\UsersController@showUser');
});
Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'forms',
    ],function(){
    Route:: post('/store','Api\FormsController@storeForm');
    Route:: patch('/update/{id}','Api\FormsController@updateForm');
    Route:: get('/show/{id}','Api\FormsController@showForm');
});

Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'grade',
    ],function(){
    Route:: post('/store','Api\GradeController@storeGrade');
    Route:: patch('/update/{id}','Api\GradeController@updateGrade');
    Route:: get('/show/{id}','Api\GradeController@showGrade');
});

Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'document',
    ],function(){
    Route:: post('/store','Api\DocumentController@storeDocument');
    Route:: patch('/update/{id}','Api\DocumentController@updateDocument');
    Route:: get('/show/{id}','Api\DocumentController@showDocument');
});

Route::group([
    'prefix'     => 'news',
    ],function(){
    Route:: post('/store','Api\NewsController@storeNews');
    Route:: get('/show','Api\NewsController@showAllNews');
    Route:: get('/show/{id}','Api\NewsController@detailNews');
    Route:: patch('/update/{id}','Api\NewsController@updateNews');
    Route:: delete('/delete/{id}','Api\NewsController@deleteNews');
});

Route::group([
    'prefix'     => 'schedule',
    ],function(){
    Route:: post('/store','Api\ScheduleController@storeSchedule');
    Route:: get('/show','Api\ScheduleController@showAllSchedule');
    Route:: patch('/update/{id}','Api\ScheduleController@updateSchedule');
    Route:: delete('/delete/{id}','Api\ScheduleController@deleteSchedule');
});

Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'payment',
    ],function(){
    Route:: post('/store','Api\PaymentConfirmationController@storePaymentConfirmation');
    Route:: patch('/update/{id}','Api\PaymentConfirmationController@updatePaymentConfirmation');
    Route:: get('/show/{id}','Api\PaymentConfirmationController@showPaymentConfirmation');
});

Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'payment-details',
    ],function(){
    Route:: post('/store','Api\PaymentDetailsController@storePaymentDetails');
    Route:: get('/show','Api\PaymentDetailsController@showPaymentDetails');
    Route:: patch('/update/{id}','Api\PaymentDetailsController@updatePaymentDetails');
});

Route::group([
    'middleware' => 'auth.jwt',
    'prefix'     => 'interest',
    ],function(){
    Route:: post('/store','Api\MajorInterestController@storeInterest');
    Route:: get('/show','Api\MajorInterestController@showAllInterest');
    Route:: patch('/update/{id}','Api\MajorInterestController@updateInterest');
    Route:: delete('/delete/{id}','Api\MajorInterestController@deleteInterest');
});