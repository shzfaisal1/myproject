<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table="products";
    protected $fillable=['category_id','name','image','slug','brand','model','short_desc','desc','keyword','technical_specification','uses','warranty'] ; 
}
