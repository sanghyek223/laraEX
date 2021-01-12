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

Route::get('/dsa', function () {
    return view('welcome');
});

Route::get('/goods','GoodsController@index')->name('goods.index'); //상품 인덱스

Route::get('/goods/{goods}', 'GoodsController@show')->name('goods.show'); //상품 상세보기

Route::get('/goods/create/write', 'GoodsController@create')->name('goods.write'); // 상품 업로드 폼

Route::post('/goods/store', 'GoodsController@store')->name('goods.store'); // 상품 업로드

Route::get('/goods/edit/{goods}', 'GoodsController@edit')->name('goods.edit'); //상품 업데이트 폼

Route::put('/goods/up/{goods}', 'GoodsController@update')->name('goods.update'); // 상품 업데이트

Route::delete('/goods/destory/{goods}', 'GoodsController@destroy')->name('goods.destory'); // 상품 삭제
