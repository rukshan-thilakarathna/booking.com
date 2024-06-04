<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Reviews extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table='reviews';
    protected $fillable=[
            'property_id',
            'user_id',
            'sub_property_id',
            'guest_id',
            'booking_id',
            'publish_date',
            'rating',
            'review_date',
            'text',
            'status'
    ];

    public function propertyName()
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }

    public function postedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guesrUser()
    {
        return $this->belongsTo(User::class, 'guest_id');
    }



}
