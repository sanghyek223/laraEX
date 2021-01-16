@extends('layouts.app_layout')
@section('content')

<form action="{{route('inspector_request')}}" method="POST" id="inspector_form" name="inspector_form">
    @csrf
<input type="text" id="postcode" name="postcode" placeholder="우편번호" readonly>
<input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br>
<input type="text" id="address" name="address" placeholder="주소" readonly><br>
<input type="text" id="detailAddress" name="detailAddress" placeholder="상세주소">
<input type="text" id="location_y_x" name="location_y_x" readonly placeholder="위도,경도">
<input type="text" id="store_title" name="store_title" placeholder="상호명">
<input type="text" id="store_content" name="store_content" placeholder="상점소개(취급물품)">
<input type="text" id="store_tel" name="store_tel" placeholder="상점번호">


<div id="wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=48b12a75f26c73faa8806b6931ff1c25&libraries=services"></script>
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script src="{{mix('/js/mypage/inspector_register.js')}}"></script>

<input type="submit" value="신청하기">
</form>

@endsection
