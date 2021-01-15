<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    function getRouteKeyName(){
        return 'goods_no';
      }

    protected $fillable = ['title', 'content', 'category', 'price'];
}
