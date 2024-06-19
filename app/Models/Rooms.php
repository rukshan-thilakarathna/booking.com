<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Access\UserAccess;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use PhpParser\Node\Stmt\Property;

class Rooms extends Model
{
    use AsSource, Chartable, Filterable, HasFactory, Notifiable, UserAccess;

    protected $table = 'rooms';

    protected $fillable = [
        'room_type_id',
        'property_id',
        'price',
        'point_price',
        'adults',
        'Children','number',
        'dicecount',
        'display_price',
        'user_choice',
        'open_point_or_cash',
        'first_payment_price',
        'image',
        'status',
    ];

    // Optional: If you have date columns that should be treated as Carbon instances
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $allowedFilters = [
        'id'            => Where::class,
        'number'          => Like::class,
        'price'          => Like::class,
        'point_price'          => Like::class,
        'status'          => Like::class,
        'created_at'    => Like::class,
        'updated_at'    => Like::class,
    ];

    protected $allowedSorts = [
        'id',
        'number',
        'status' ,
        'point_price',
        'price',
        'created_at',
    ];

    // Optional: Define relationships, if any
    // For example, if there's a relationship with RoomType or Property models

     public function roomType()
     {
         return $this->belongsTo(RoomType::class, 'room_type_id');
     }

     public function property()
     {
         return $this->belongsTo(Properties::class, 'property_id');
     }
}
