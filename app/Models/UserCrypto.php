<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCrypto extends Model
{
    use HasFactory;    
    use SoftDeletes;

    public function crypto_options() {
        return $this->belongsTo(CryptoOption::class, 'crypto_option_id', 'id');
    }

    public function payments_processing(){
        return $this->belongsTo(WithdrawRequest::class, 'id', 'payment_via_id')
                    ->where("is_resolved", 0)
                    ->where("payment_method", 3);
    }
}
