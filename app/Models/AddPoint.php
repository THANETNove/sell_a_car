<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'point',
        'date',
        'point_bank_name',
        'other',
        'images',
        'status'
    ];
}