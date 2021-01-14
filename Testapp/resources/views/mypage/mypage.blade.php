@extends('layouts.app_layout')

@section('header') @include('common.header')
@stop

@section('content')
<h1>Mypage</h1>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>

@stop

@section('footer') @include('common.footer')
@stop
