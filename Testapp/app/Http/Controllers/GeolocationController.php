<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    public function main_page(Request $request) //메인페이지
    {
        $value = array();
        $value = array("status" => 200,'location' => $request->data);
        return $value;
    }
}
