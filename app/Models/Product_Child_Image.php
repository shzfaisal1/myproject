<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Child_Image extends Model
{
    use HasFactory;

    protected $table="product__child__images";
    protected $fillable=['product_child_image','product_id'];
}
