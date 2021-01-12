@extends('layouts.goods') @section('header') @include('common.header') @stop
@section('content')
<form action="{{ route('goods.update', $goods->no) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="title">제목</label>
        <input
            type="text"
            name="title"
            id="title"
            class="form-control @error('title') is-invalid @enderror"
            placeholder=""
            aria-describedby="title"
            value="{{$goods->title }}">
        @error('title')
        <p class="invalid-feedback">제목을 입력하세요</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">내용</label>
        <textarea
            class="form-control @error('content') is-invalid  @enderror"
            name="content"
            id="content"
            rows="3">{{$goods->content}}</textarea>
        @error('content')
        <p class="invalid-feedback">내용을 입력하세요</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">저장</button>
</form>
<form action="{{ route('goods.destory', $goods->no) }}" method="POST">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-danger">삭제</button>
</form>
@endsection @section('footer') @include('common.footer') @stop
