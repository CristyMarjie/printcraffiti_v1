<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\QuoteRequest;

class QuoteRequest extends Model
{
    use HasFactory;

    protected  $table = 'quote_requests';
    protected $fillable = [
        'customer_id',
        'quote_title',
        'quantity',
        'dimension',
        'details',
        'status'
    ];
}
