<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;

    protected $table="coupons";
    protected $fillable=['Title','Code','value','type','min_order_amt','is_one_time'];
    public $timestamp=false;
}
