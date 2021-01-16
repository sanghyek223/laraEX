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

require __DIR__.'/auth.php';

Route::get('/', function () { // App Main page
    return view('main.welcome');
})->name('main_index');

Route::get('/test', function () { // App Main page
    return view('mypage.mypage_inspector_register');
});

Route::get('/admin', function () { // 관리자페이지 작업용
    return view('admin.admin_index');
})->name('admin');

Route::get('/admin/inspector_request', function () { // 관리자페이지 작업용(검수회원 신청현황)
    return view('admin.admin_inspector_request');
})->name('inspector_request');

// 회원 Mypage
Route::get('/mypage','MypageController@index')->middleware(['auth'])->name('mypage'); //마이페이지

Route::get('/mypage/inspector','MypageController@inspector_menu')->middleware(['auth'])->name('inspector_menu'); //검수자 메뉴

Route::get('/mypage/inspector/guide','MypageController@inspector_guide')->middleware(['auth'])->name('inspector_guide'); //검수자 가이드

//작업해야함 Table 만들어야함 cofirm table
Route::get('/mypage/inspector/confirm','MypageController@inspector_confirm')->middleware(['auth'])->name('inspector_confirm'); //검수자 신청현황

Route::get('/mypage/inspector/register','MypageController@inspector_register')->middleware(['auth'])->name('inspector_register'); //검수자 회원가입폼

Route::post('/mypage/inspector/request','MypageController@inspector_request')->middleware(['auth'])->name('inspector_request'); //검수자 회원가입

// 관리자페이지 Route
Route::get('/admin/dashboard','AdminController@index')->middleware(['admin'])->name('dashboard'); //관리자 페이지

// 인증번호 Route
Route::post('/sms_confirm','SmsController@confirm_num')->name('confirm_num'); //sms 인증번호 발송
Route::post('/register_confirm_num','SmsController@register_confirm_num')->name('register_confirm_num'); //회원가입 sms 인증번호 발송

// 검수자 페이지 Route
Route::get('/inspector','InspectorController@index')->middleware(['inspector'])->name('inspector.main'); //검수자 페이지

// 상품 페이지 Route
/* Route::get('/goods','GoodsController@index')->name('goods'); //상품 인덱스

Route::get('/goods/{goods}', 'GoodsController@show')->name('goods.show'); //상품 상세보기

Route::get('/goods/create', 'GoodsController@create')->middleware(['auth'])->name('goods.create'); // 상품 업로드 폼

Route::post('/goods/store', 'GoodsController@store')->middleware(['auth'])->name('goods.store'); // 상품 업로드

Route::get('/goods/{goods}/edit', 'GoodsController@edit')->middleware(['auth'])->name('goods.edit'); //상품 업데이트 폼

Route::put('/goods/{goods}', 'GoodsController@update')->middleware(['auth'])->name('goods.update'); // 상품 업데이트

Route::delete('/goods/{goods}', 'GoodsController@destroy')->middleware(['auth'])->name('goods.destory'); // 상품 삭제 */

