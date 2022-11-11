<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brnad extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name',
        'brand_name_urdu',
        'brand_slug_eng',
        'brand_slug_urdu',
        'brand_img'
    ];
}
