<?php

namespace App\Http\Controllers;

use App\Models\Sms_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendPurchaseReceipt;
use Illuminate\Notifications\Notification;

class SmsController extends Controller
{

    public function confirm(Request $request)
    {

        $randomNum = mt_rand(100000, 999999);

        $result = DB::table('users')
            ->where('u_phone', $request->input('u_phone'))
            ->update(['password' => Hash::make($randomNum)]);

        $value = array();

        if ($result == 1) {
            $sms_result = Sms_setting::find(1);
            $sms_result["phone_num"] = $request->input('u_phone');
            $sms_result["confirm_num"] = $randomNum;
            //$sms_result->notify(new SendPurchaseReceipt);
            $value = array("status" => 200,'confirm_num' => $randomNum);

        } else {
            $value = array("status" => 500);
        }

        return $value;
    }

/*     public function confirm_num_check(Request $request)
    {

        $value = $request->session()->get('confirm_num');
        $confirm = $request->input('confirm_check');
        $result = array();

        if ($value == (int)$confirm) {
            $result = array("msg" => '인증성공', "인증번호" => $value, "confirm_num" => $confirm);
        } else {
            $result = array("msg" => '인증실패', "인증번호" => $value, "confirm_num" => $confirm);
        }

        return $result;
    } */
}
