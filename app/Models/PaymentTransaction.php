<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctorData()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
