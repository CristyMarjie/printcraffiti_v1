<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Priority;
use App\Models\User;
// use Illuminate\Database\Eloquent\Relations\HasOne;

// Task ---1 Priority
// Task ---1 User
class Task extends Model
{
    use HasFactory;

    public function priority()
    {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
