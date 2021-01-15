@extends('layouts.app_layout')
@section('content')

@foreach ($result as $result)
{{ $result->confirm }}
@endforeach
<a href="{{ route('mypage') }}">돌아가기</a>
@endsection
