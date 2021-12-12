<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use PDO;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role', 'type', 'phone', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function showUsers()
    {
        return (new static)->get();
    }
    public static function admin()
    {
        return (new static)::where('role', 'admin')->get();
    }
    public static function doctor()
    {
        return (new static)::where('role', 'doctor')->get();
    }
    public static function user()
    {
        return (new static)::where('role', 'user')->get();
    }

    public function doctorData()
    {
        return $this->hasOne(Doctor::class, 'user_id');
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function doctorVideos()
    {
        return $this->hasMany(Doctorvideo::class);
    }

    public function onlineStatus()
    {
        return $this->hasOne(OnlineStatus::class);
    }

    public function doctorActiveSchedules()
    {
        return $this->hasMany(SlotTime::class)->where('booking_status', 1);
    }


    public function doctorSchedules()
    {
        return $this->hasMany(SlotTime::class);
    }

    public function wallet()
    {
        return $this->hasOne(wallet::class, 'user_id');
    }

    public function payment_transaction_debited()
    {
        return $this->hasMany(PaymentTransaction::class, 'from_user_id');
    }

    public function  payment_transaction_credited()
    {
        return $this->hasMany(PaymentTransaction::class, 'to_user_id');
    }

    public function sessions()
    {
        return $this->hasMany(AppointmentSchedule::class, 'doctor_id');
    }

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class);
    }
}
