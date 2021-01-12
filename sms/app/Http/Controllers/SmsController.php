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
}
