<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    public function hashings() {
        return $this->belongsTo(Hashing::class, 'hashing_id', 'id');
    }

    public function action_by() {
        return $this->belongsTo(User::class, 'action_performmed_by', 'id');
    }

    public function payments(){
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
}
