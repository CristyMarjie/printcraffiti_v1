<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address1'
    ];


    public function user(){
        return $this->hasOne(User::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


}
