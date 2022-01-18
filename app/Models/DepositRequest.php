<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositRequest extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hashings() {
        return $this->belongsTo(Hashing::class, 'hashing_id', 'id');
    }

    public function action_performer() {
        return $this->belongsTo(User::class, 'action_performed_by', 'id');
    }
    
    public function coinbase_payments(){
        return $this->belongsTo(CoinbasePayment::class, 'coinbase_payment_id', 'id');
    }
}
