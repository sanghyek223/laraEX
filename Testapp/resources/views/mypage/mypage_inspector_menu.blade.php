@extends('layouts.app_layout')

@section('content')

<ul>
<li><a href="{{ route('inspector_guide') }}">가이드</a></li>
    @if($result == 200)
    <li><a href="#">검수신청목록</a></li>
    @else
    <li><a id="inspector_register" href="{{ route('inspector_register') }}">신청하기</a></li>
    <li><a href="{{ route('inspector_confirm') }}">신청현황</a></li>
    @endif

</ul>
<script>
$( document ).ready(function() {
    if({{$result}} == 300) {
    $("#inspector_register").attr("href", "javascript:register_confirm();")
    }
});

function register_confirm() {
    alert('승인 대기중 입니다');
}
</script>
@endsection

