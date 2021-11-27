<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTimeAttribute($value)
    {
        if ($value != null) {
            return unserialize($value);
        }

        return $value;
    }
}
