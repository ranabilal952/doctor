<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotTime extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function slot()
    {
        return $this->hasMany('App\slot');
    }
}
