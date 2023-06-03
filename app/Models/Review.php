<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected  $table = 'reviews';
    protected $fillable = [
        'customer_id',
        'order_id',
        'rate',
        'review',
        'reply',
        'status'
    ];
}
