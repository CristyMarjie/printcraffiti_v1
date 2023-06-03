<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected  $table = 'quotations';
    protected $fillable = [
        'quote_request_id',
        'quotation_tile',
        'quotation_file',
        'status'
    ];

    public function quote_request()
    {
        return $this->belongsTo(QuoteRequest::class);
    }
}
