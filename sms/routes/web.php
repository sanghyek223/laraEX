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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sms','SmsController@index')->name('sms'); //sms 전송

Route::post('/sms/confirm','SmsController@confirm')->name('confirm'); //sms cofirm_num test

Route::post('/sms/confirm_check','SmsController@confirm_num_check')->name('confirm_check'); //sms cofirm_num test
