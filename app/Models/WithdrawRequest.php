<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
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
    
    public function user_banks(){
        return $this->belongsTo(UserBank::class, 'payment_via_id', 'id');
    }

    public function user_cryptos(){
        return $this->belongsTo(UserCrypto::class, 'payment_via_id', 'id')->with("crypto_options");
    }
}
