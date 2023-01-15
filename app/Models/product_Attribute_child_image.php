<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_Attribute_child_image extends Model
{
    use HasFactory;

    public $table="product__attribute_child_image";
    public $fillable=['product_id','product_attribute_child_image'] ;
}
