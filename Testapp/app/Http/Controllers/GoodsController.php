<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{

    public function index()
    {
        $goods = DB::table('goods')->get();
       return view('goods.goods_list', compact('goods'));
    }
    public function create()
    {
        return view('goods.goods_creat');
    }
    public function store(Request $request)
    {
        $user_check = Auth::user();
        DB::table('goods')->insert([
            'u_id' => $user_check->id,
            'category' => $request->input('category'),
            'goods_title' => $request->input('title'),
            'goods_content' => $request->input('content'),
            'goods_price' => $request->input('price')
        ]);
        return redirect()->route('goods');
    }
    public function show(Goods $goods)
    {
        return view('goods.goods_show', compact('goods'));
    }
    public function edit(Goods $goods)
    {
        return view('goods.goods_edit', compact('goods'));
    }
    public function update(Request $request, Goods $goods)
    {
        DB::table('goods')->where('goods_no', $goods->goods_no)->update([
            'category' => $request->input('category'),
            'goods_title' => $request->input('title'),
            'goods_content' => $request->input('content'),
            'goods_price' => $request->input('price')
        ]);
        return redirect()->route('goods.show', $goods->goods_no);
    }
    public function destroy(Goods $goods)
    {
        DB::table('goods')->where('goods_no', $goods->goods_no)->delete();
        return redirect()->route('goods.index');
    }
    protected function validategoods()
    {
        return request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    }
}
