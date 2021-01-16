@extends('layouts.app_layout')
@section('content')

@foreach ($result as $result)
{{ $result->confirm }}
@if($result->status == 300)
{{ $result->created_at }}
@else
{{ $result->updated_at }}
@endif
@endforeach
<a href="{{ route('mypage') }}">돌아가기</a>
@endsection
