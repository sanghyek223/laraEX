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

<input type="button" value="click" onclick="geoFindMe()">

<script>
function geoFindMe() {

function success(position) {
  const latitude  = position.coords.latitude;
  const longitude = position.coords.longitude;

  const x_y = latitude +","+longitude;
  console.log(x_y);
  test(x_y);
}

function error() {
  status.textContent = 'Unable to retrieve your location';
}

if(!navigator.geolocation) {
  status.textContent = 'Geolocation is not supported by your browser';
} else {
  status.textContent = 'Locating…';
  navigator.geolocation.getCurrentPosition(success, error);
}
}

function test(x_y) {
    $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'post',
                                url: "{{ route('geo_main') }}",
                                dataType: 'json',
                                data: {

                                    data: x_y

                                },
                                success: function (data) {
                                        console.log(data);
                                },
                                error: function (data) {
                                    console.log("error" + data);
                                }
                            });
}
</script>
@endsection

