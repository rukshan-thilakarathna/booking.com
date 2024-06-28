<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Access\UserAccess;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use PhpParser\Builder\Property;

class Booking extends Model
{
    use AsSource, Chartable, Filterable, HasFactory, Notifiable, UserAccess;
    protected $table='bookings';
    protected $fillable=['property_id','user_id','name','email','phone_number','check_in_Date','check_out_Date','booking_date','room_type','room_id','room_number',
        'total_amount','payment_method','adults','children','booking_on_point','special_requests','cancellation_reason','paymentstatus',
        'booking_status'];
// Get the properties that owns the booking.



    protected $allowedFilters = [
        'id'            => Where::class,
        'room_number'   => Where::class,
        'created_at'    => Like::class,
        'updated_at'    => Like::class,
    ];
    protected $allowedSorts = [
        'id',
        'room_number',
        'created_at',
        'updated_at'
    ];









    public function properties()
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type');
    }

    public function Room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
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
