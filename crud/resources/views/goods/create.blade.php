@extends('layouts.goods')

@section('header') @include('common.header')
@stop

@section('content')
<h1>글쓰기</h1>
    <form action="{{ route('goods.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="category">카테고리</label>
          <input
          type="text"
          name="category"
          id="category"
          class="form-control @error('category') is-invalid @enderror"
          placeholder=""
          aria-describedby="category"
          value="{{ old('category') }}">
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
          value="{{ old('title') }}">
          @error('title')
          <p class="invalid-feedback">제목을 입력하세요</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="content">내용</label>
          <textarea class="form-control @error('content') is-invalid  @enderror" name="content" id="content" rows="3">{{ old('content') }}</textarea>
          @error('content')
          <p class="invalid-feedback">내용을 입력하세요</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">저장</button>
    </form>
@endsection

@section('footer') @include('common.footer')
@stop
