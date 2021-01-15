<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() //관리자 페이지 메인
    {
       return view('admin.admin_index');
    }
}
