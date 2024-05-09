<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payments';
    protected $fillable=['booking_id','user_id','amount','payment_date','payment_method','payment_status'];
    // Get the payment that owns the booking.

    public function booking()
    {
        return $this->belongsTo(Bookings::class, 'booking_id');
    }
    // Get the payment that owns the users.

    public function userss()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
