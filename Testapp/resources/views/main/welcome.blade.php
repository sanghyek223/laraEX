@extends('layouts.app_layout')

@section('content')

<ul>
@if (Route::has('login'))
@auth
    <li><a href="{{ route('mypage') }}">마이페이지</a></li>
@else
<li><a href="{{ route('login') }}">로그인</a></li>

@if (Route::has('register'))
<li><a href="{{ route('register') }}">회원가입</a></li>
@endif
@endauth
@endif
    <li><a href="">상품</a></li>

</ul>
@endsection

