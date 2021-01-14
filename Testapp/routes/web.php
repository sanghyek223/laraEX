<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { // App Main page
    return view('welcome');
})->name('main_index');

Route::get('/mypage', function () { //마이페이지
    return view('mypage.mypage');
})->middleware(['auth'])->name('mypage');

Route::get('/admin/dashboard', function () { //관리자 페이지
    $user_check = Auth::user();
    if($user_check->u_level == 5) {
        return view('admin.dashboard');
    }else{
        return redirect()->route("main_index");
    }
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::post('/sms_confirm','SmsController@confirm')->name('confirm'); //sms cofirm_num test

Route::get('/goods','GoodsController@index')->name('goods.index'); //상품 인덱스

Route::get('/goods/{goods}', 'GoodsController@show')->name('goods.show'); //상품 상세보기

Route::get('/goods/create/write', 'GoodsController@create')->name('goods.write'); // 상품 업로드 폼

Route::post('/goods/store', 'GoodsController@store')->name('goods.store'); // 상품 업로드

Route::get('/goods/edit/{goods}', 'GoodsController@edit')->name('goods.edit'); //상품 업데이트 폼

Route::put('/goods/up/{goods}', 'GoodsController@update')->name('goods.update'); // 상품 업데이트

Route::delete('/goods/destory/{goods}', 'GoodsController@destroy')->name('goods.destory'); // 상품 삭제
