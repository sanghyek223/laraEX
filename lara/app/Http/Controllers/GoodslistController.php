<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodslistController extends Controller
{
    public function index() //메인페이지 메소드
    {
        return view('goods.index');
    }

    public function Create() //메인페이지 메소드
    {
        return view('goods.create');
    }
}
