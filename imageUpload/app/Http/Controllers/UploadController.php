<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function iimgUP (Request $request) {

        echo $request->all();
    }
}
