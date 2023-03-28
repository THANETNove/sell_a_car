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
        'categorie_name',
        'zom_name',
        'sub_category',
        'province',
        'url_facebook',
        'url_Line',
        'expiration_date',
        'image',
        'status'
    ];
} 