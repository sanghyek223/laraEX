@extends('layouts.app_layout')

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

                        <a href="{{route('inspector_menu')}}">검수회원</a>

@stop
