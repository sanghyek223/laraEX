@extends('layouts.goods')

@section('header') @include('common.header')
@stop

@section('content')
@foreach($goods as $goods)
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-9">
            <div class="card-body">
                <span class="card-text"><small class="text-muted">{{ $goods->no }}</small></span>
                <span><a href="{{ route('goods.show', $goods->no) }}">{{ $goods->title }}</a></span>
                <span class="card-text">{{ $goods->content }}</span>
                <a href="{{ route('goods.edit', $goods->no) }}">update</a>
            </div>
        </div>
    </div>
</div>

@endforeach
<a href="{{ route('goods.write') }}">글쓰기</a>
@stop

@section('footer') @include('common.footer')
@stop
