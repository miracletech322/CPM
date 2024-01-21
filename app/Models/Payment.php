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

    public function coin() {
        return $this->belongsTo(CoinData::class, 'coin_data_id', 'id')->with("hashing");
    }


    public function coinbase_payments() {
        return $this->belongsTo(CoinbasePayment::class, 'coinbase_payment_id', 'id');
    }

    public function stripe_payments() {
        return $this->belongsTo(StripePayment::class, 'stripe_payment_id', 'id');
    }
}
