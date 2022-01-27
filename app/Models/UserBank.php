<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBank extends Model
{
    use HasFactory;    
    use SoftDeletes;

    public function payments_processing(){
        return $this->belongsTo(WithdrawRequest::class, 'id', 'payment_via_id')
                    ->where("is_resolved", 0)
                    ->where("payment_method", 2);
    }
}
