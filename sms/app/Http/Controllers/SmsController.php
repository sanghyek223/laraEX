<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

        Session::put('confirm_num', $randomNum);
        $value = $request->session()->get('confirm_num');

        $result = array("conrirm_num"=> $value);

        return $result;
    }

    public function confirm_num_check(Request $request) {

        $value = $request->session()->get('confirm_num');
        $confirm = $request->input('confirm_check');
        $result = array();

        if ($value == (int)$confirm) {
            $result = array("msg"=> '인증성공', "인증번호"=> $value, "confirm_num"=>$confirm);
            $request->session()->forget('confirm_num');
        }
        else {
            $result = array("msg"=> '인증실패', "인증번호"=> $value, "confirm_num"=>$confirm);
        }

        return $result;
    }
}
