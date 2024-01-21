<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinData extends Model
{
    use HasFactory;

    public function hashing() {
        return $this->belongsTo(Hashing::class, 'hashing_id', 'id');
    }
}
