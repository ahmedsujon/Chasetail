<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostDog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'images',
        'address',
        'name',
        'breed',
        'color',
        'marking',
        'gender',
        'last_seen',
        'medicine_info',
        'description',
    ];
}
