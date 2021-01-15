<?php

namespace App\Http\Controllers;

use App\Models\Inspector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index() //마이페이지 메인
    {
        return view('mypage.mypage_main');
    }

    public function inspector_menu() // 검수자 메뉴
    {
        $user_check = Auth::user();
        $result = Inspector::where('u_id', $user_check->id)->value('status');

        return view('mypage.mypage_inspector_menu', compact('result'));
    }

    public function inspector_guide() // 검수자 메뉴
    {
        return view('mypage.mypage_inspector_guide');
    }

    public function inspector_confirm() // 검수자 메뉴
    {
        $user_check = Auth::user();
        $result = Inspector::where('u_id', $user_check->id)->get();
        return view('mypage.mypage_inspector_confirm', compact('result'));
    }

    public function inspector_register() // 검수자 회원가입 폼
    {
        return view('mypage.mypage_inspector_register');
    }

    public function inspector_request(Request $request) // 검수자 회원가입 DB insert
    {
        $user_check = Auth::user();
        $created_date = Date('Y-m-d h:i:s');
        /*         DB::table('inspectors')->insert([ //검수회원 DB
            'u_id' => $user_check->id,
            'addr' => $request->input('address'),
            'detailaddr' => $request->input('detailAddress'),
            'location_y_x' => $request->input('location_y_x'),
            'store_title' => $request->input('store_title'),
            'store_content' => $request->input('store_content'),
            'store_tel' => $request->input('store_tel'),
            'status' => '승인 대기중 입니다',
            'created_at' => $created_date
        ]); */

        Inspector::insert([
            'u_id' => $user_check->id,
            'addr' => $request->input('address'),
            'detailaddr' => $request->input('detailAddress'),
            'location_y_x' => $request->input('location_y_x'),
            'store_title' => $request->input('store_title'),
            'store_content' => $request->input('store_content'),
            'store_tel' => $request->input('store_tel'),
            'confirm' => '승인 대기중 입니다',
            'created_at' => $created_date
        ]);

        return redirect()->route('mypage');
    }
}
