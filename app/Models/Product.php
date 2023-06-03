<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'specs',
        'unit_price',
        'bundle_discount',
        'discount_percentage',
        'lead_time',
        'image',
        'status'
    ];

    

    // public function carts()
    // {
    //     return $this->hasMany(Cart::class);
    // }
}
