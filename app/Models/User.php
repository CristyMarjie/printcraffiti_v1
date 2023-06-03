<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'super_user',
        'people_id',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function people(){
        return $this->belongsTo(People::class);
    }

    public function isAdmin(){
        return $this->role_id == Role::ADMIN;
    }

    public function isStaff(){
        return $this->role_id == Role::STAFF;
    }

    public function isCustomer(){
        return $this->role_id == Role::CUSTOMER;
    }

    // protected  $table = 'users';
    // protected $fillable = [
    //     'people_id',
    //     'email',
    //     'password',
    //     'role_id',
    //     'active',
    //     'added_by',
    //     'remember_token'
    // ];

}
