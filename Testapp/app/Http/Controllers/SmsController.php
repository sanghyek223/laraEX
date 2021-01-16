<?php

namespace App\Http\Controllers;

use App\Models\Sms_setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendPurchaseReceipt;
use Illuminate\Notifications\Notification;

class SmsController extends Controller
{

    public function confirm_num(Request $request) // sms 인증문자 보내기 (회원전용)
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

    public function register_confirm_num(Request $request) // 회원가입 인증문자 보내기
    {

        $randomNum = mt_rand(100000, 999999);
        $value = array();

        $result = DB::table('users')->where('u_phone', $request->input('u_phone'))->value('u_phone'); //회원 check

        if($result != null) {
            $value = array("status" => 500);
         }else {
            $sms_result = Sms_setting::find(1);
            $sms_result["phone_num"] = $request->input('u_phone');
            $sms_result["confirm_num"] = $randomNum;
            //$sms_result->notify(new SendPurchaseReceipt);
            $value = array("status" => 200,'confirm_num' => $randomNum);
         }

        return $value;
    }

}
