<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class machinetest extends Model
{

    protected $table ="machine_test";
    protected $fillable=['name','email','country_id','state_id','city_id'];
    public $timestamp=false;
    use HasFactory;
}
