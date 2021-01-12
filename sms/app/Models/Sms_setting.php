<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SendPurchaseReceipt;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sms_setting extends Model
{
    use HasFactory, Notifiable;



}
