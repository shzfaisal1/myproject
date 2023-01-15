<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jsonform extends Model
{
    use HasFactory;

    protected $table ="jsonform";
    protected $fillable=['name','email','number','country_id','state_id','city_id'];
}
