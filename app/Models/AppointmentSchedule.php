<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function slot()
    {
        return $this->belongsTo(SlotTime::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function meetingLink()
    {
        return $this->hasOne(JitsiMeeting::class, 'appointment_id');
    }

    public function coupon()
    {
        return $this->hasOne(CouponUsage::class, 'appointment_schedule_id')->with('coupon');
    }
}
