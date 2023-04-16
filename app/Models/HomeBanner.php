<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $table="HomeBanner";
    protected $fillable=['image','text','url','status'];

    use HasFactory;
}
