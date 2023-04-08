<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogUserWebAccess extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_url_ip'
    ];
}