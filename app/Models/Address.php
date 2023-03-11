<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'tel',
        'address',
        'subDistrict',
        'district',
        'province',
        'zipCode',
        'facebook',
        'line',
        'instagram',
        'twitter',
    ];
}