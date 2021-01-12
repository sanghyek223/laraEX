<?php

namespace App\Http\Controllers;

use App\Models\Sms_setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Notifications\SendPurchaseReceipt;
use Illuminate\Notifications\Notification;

class SmsController extends Controller
{
    public function index() {
        $query = Sms_setting::where("category","회원가입")->get();
        echo $query;
    }

    public function confirm(Request $request) {

        $randomNum = mt_rand(000000, 999999);
        Session::put('confirm_num', $randomNum);

        $query = Sms_setting::find(1);
        $query["phone_num"] = $request->input('phone');
        $query["confirm_num"] = $randomNum;
        $query->notify(new SendPurchaseReceipt);

        $result = array("phone"=> $request->input('phone'), "conrirm_num"=> $randomNum);

        return $result;
    }

    public function confirm_num_check(Request $request) {

        $value = $request->session()->get('confirm_num');
        $confirm = $request->input('confirm_check');
        $result = array();

        if ($value == (int)$confirm) {
            $result = array("msg"=> '인증성공', "인증번호"=> $value, "confirm_num"=>$confirm);
        }
        else {
            $result = array("msg"=> '인증실패', "인증번호"=> $value, "confirm_num"=>$confirm);
        }

        return $result;
    }
}
