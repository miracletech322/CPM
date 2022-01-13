<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hashings() {
        return $this->belongsTo(Hashing::class, 'hashing_id', 'id');
    }
}
