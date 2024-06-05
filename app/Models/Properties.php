<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDate;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Filters\Types\WhereIn;
use Orchid\Filters\Types\WhereMaxMin;
use Orchid\Screen\AsSource;

class Properties extends Model
{
	use HasFactory;
    use AsSource;
    use Filterable;

	protected $table='properties';
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'email',
        'review_id',
        'booking',
        'main_location',
        'sub_location',
        'address',
        'description',
        'description',
        'image',
        'contact_number',
        'whatsapp_number',
        'facebook_link',
        'tiktok_link',
        'linkedin_link',
        'instagram_link',
        'twitter_link',
        'status'
    ];

    protected $allowedFilters = [
        'id'            => Where::class,
        'name'          => Like::class,
        'email'         => Like::class,
        'contact_number'=> Like::class,
        'created_at'    => Like::class,
        'deleted_at'    => Like::class,
    ];
    protected $allowedSorts = [
        'status',
        'id',
        'publish_at',
        'contact_number' ,
        'created_at',
    ];

//    public function booking()
//	{
//		return $this->hasMany(Bookings::class);
//	}
//
//	public function review()
//	{
//		return $this->hasMany(Reviews::class);
//	}
//

    public function propertyOwner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   public function district()
   {
	   return $this->belongsTo(Districts::class, 'main_location');
   }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'sub_location');
    }

   public function propertyType()
   {
	   return $this->belongsTo(PropertyType::class, 'type');
   }
}
