<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{

    public function index(){
        $goods = Goods::orderBy('no', 'desc')->paginate(15);
        return view('goods.index', compact('goods'));
    }
    public function create()
    {
        return view('goods.create');
    }
    public function store(Request $request)
    {
        DB::table('goods')->insert(['user_id' => '1', 'category' => $request->input('category'), 'title' => $request->input('title'),'content' => $request->input('content')]);
        return redirect()->route('goods.index');
    }
    public function show(Goods $goods)
    {
        return view('goods.show', compact('goods'));
    }
    public function edit(Goods $goods)
    {
        return view('goods.edit', compact('goods'));
    }
    public function update(Request $request,Goods $goods)
    {
        DB::table('goods')->where('no', $goods->no)->update(['title' => $request->input('title'),'content' => $request->input('content')]);
        return redirect()->route('goods.show', $goods->no);
    }
    public function destroy(Goods $goods)
    {
        DB::table('goods')->where('no', $goods->no)->delete();
        return redirect()->route('goods.index');
    }
    protected function validategoods(){
        return request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    }
}
