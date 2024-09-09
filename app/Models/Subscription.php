<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'card_holder_name',
        'multiple_image',
        'amount',
        'plan',
        'currency',
        'payment_status',
        'user_id',
    ];
}
