<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Property;

class Booking extends Model
{
    use HasFactory;
    protected $table='bookings';
    protected $fillable=['property_id','user_id','name','email','phone_number','check_in_Date','check_out_Date','booking_date','room_type','room_id',
        'total_amount','payment_method','adults','children','booking_on_point','special_requests','cancellation_reason','paymentstatus',
        'booking_status'];
// Get the properties that owns the booking.

    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    // Get the users that owns the booking.

    public function userss()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

}
