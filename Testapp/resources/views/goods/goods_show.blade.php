@extends('layouts.app_layout')

@section('header') @include('common.header')
@stop

@section('content')
<div>카테고리 : {{ $goods->category }}</div>
<div>제목 : {{ $goods->goods_title }}</div>
<div>가격 : {{ $goods->goods_price }} 원</div>
<div>내용 : {{ $goods->goods_content }}</div>

@if ($goods->u_id == $auth_user)
<a href="{{ route('goods.edit', $goods->no) }}">수정</a>
<form action="{{ route('goods.destory', $goods->no) }}" onsubmit="return check_del()" method="POST">
@csrf @method('DELETE')
    <button type="submit">삭제</button>
</form>
@endif

@stop

<script>
function check_del() {
    var check_val = confirm("게시글을 삭제 하시겠습니까?");
    return check_val;
}
</script>

@section('footer') @include('common.footer')
@stop
