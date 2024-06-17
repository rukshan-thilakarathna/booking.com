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

class RoomType extends Model
{
    use AsSource, Chartable, Filterable, HasFactory, Notifiable, UserAccess;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'images',
        'room_size',
        'bathroom_facilities',
        'bathroom_count',
        'washroom_count',
        'kitchen_count',
        'kitchen_facilities',
        'description',
        'property_type',
        'room_facilities',
        'view_facilities',
        'smoking',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'smoking' => 'boolean',
        'status' => 'boolean',
    ];

    protected $allowedFilters = [
        'id'            => Where::class,
        'name'          => Like::class,
        'created_at'    => Like::class,
        'updated_at'    => Like::class,
    ];
    protected $allowedSorts = [
        'id',
        'name',
        'created_at',
    ];

    /**
     * Get the room type's images as an array.
     *
     * @param  string  $value
     * @return array
     */
    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Set the room type's images.
     *
     * @param  array  $value
     * @return void
     */
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
}
