<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'name_products',
        'product_details',
        'product_price',
        'hot_zone_price',
        'image',
        'status'
    ];
}