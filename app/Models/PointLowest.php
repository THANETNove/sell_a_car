<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointLowest extends Model
{
    use HasFactory;
    protected $fillable = [
        'point_lowest',
        'point_loweste_date',
        'zom_name'
    ];
}