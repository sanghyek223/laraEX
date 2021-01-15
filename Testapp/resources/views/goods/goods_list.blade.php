@extends('layouts.app_layout')

@section('content')

@foreach($goods as $goods)
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-9">
            <div class="card-body">
                <span class="card-text">
                    <small class="text-muted">{{ $goods->goods_no }}</small>
                </span>
                <span>
                    <a href="{{ route('goods.show', $goods->goods_no) }}">{{ $goods->goods_title }}</a>
                </span>
                <span class="card-text">{{ $goods->goods_content }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach

<a href="{{ route('goods.create') }}">글쓰기</a>
@endsection


