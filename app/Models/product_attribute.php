<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_attribute extends Model
{
    use HasFactory;

    protected $table="product_attribute";
    protected $fillable =['product_id','sku','attribute_image','price','quantity','size_id','color_id'];
}
