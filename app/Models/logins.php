<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logins extends Model
{
    use HasFactory;

    protected $table='logins';
    protected $fillable=['email','password','updated_at','created_at'];
    public $timestamp=false;
}
