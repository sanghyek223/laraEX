@extends('layouts.goods')

@section('header') @include('common.header')
@stop

@section('content')
<h1>{{ $goods->title }}</h1>
<div class="mt-3 pt-3 border-top">{{ $goods->content }}</div>
@stop

@section('footer') @include('common.footer')
@stop