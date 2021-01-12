<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SendPurchaseReceipt;

class SmsController extends Controller
{
    public function index() {
        //request()->phone->notify(new SendPurchaseReceipt);
        User::find(1)->notify(new SendPurchaseReceipt);
    }

    public function confirm(Request $request) {

        $phone = $request->input('phone');
        $randomNum = mt_rand(000000, 999999);
        $result = array();
        $result = array("phone"=> $phone , "conrirm_num"=> $randomNum);

        return $result;
    }
}
