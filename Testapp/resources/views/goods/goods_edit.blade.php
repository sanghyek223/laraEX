@extends('layouts.app_layout')

@section('header') @include('common.header') @stop

@section('content')
<form action="{{ route('goods.update', $goods->no) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="category">카테고리</label>
        <input
        type="text"
        name="category"
        id="category"
        class="form-control @error('category') is-invalid @enderror"
        placeholder=""
        aria-describedby="category"
        value="{{$goods->category}}">
        @error('category')
        <p class="invalid-feedback">카테고리를 입력하세요</p>
        @enderror
      </div>

    <div class="form-group">
        <label for="title">제목</label>
        <input
            type="text"
            name="title"
            id="title"
            class="form-control @error('title') is-invalid @enderror"
            placeholder=""
            aria-describedby="title"
            value="{{$goods->goods_title }}">
        @error('title')
        <p class="invalid-feedback">제목을 입력하세요</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="category">가격</label>
        <input
        type="text"
        name="price"
        id="price"
        class="form-control @error('price') is-invalid @enderror"
        onkeyup="inputNumberFormat(this)"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
        value="{{$goods->goods_price }}">
        @error('price')
        <p class="invalid-feedback">가격을 입력하세요</p>
        @enderror
      </div>

    <div class="form-group">
        <label for="content">내용</label>
        <textarea
            class="form-control @error('content') is-invalid  @enderror"
            name="content"
            id="content"
            rows="3">{{$goods->goods_content}}</textarea>
        @error('content')
        <p class="invalid-feedback">내용을 입력하세요</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">저장</button>
</form>
<script>
function inputNumberFormat(obj) {
    obj.value = comma(uncomma(obj.value));
}
function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

function uncomma(str) {
    str = String(str);
    return str.replace(/[^\d]+/g, '');
}
   </script>
@endsection

@section('footer') @include('common.footer') @stop
