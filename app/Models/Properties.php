<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
	use HasFactory;
	protected $table='properties';
	protected $fillable=['user_id','name','type','email','review_id','booking',
'description','image','contact_number','whatsapp_numner','facebook_link','tiktok_link','linkedin_link'
,'instagram_link','twitter_link','status'];
public function booking()
	{
		return $this->hasMany(Bookings::class);
	}
	public function review()
	{
		return $this->hasMany(Reviews::class);
	}
	 // Get the users that owns the properies.
	
   public function userss()
   {
	   return $this->belongsTo(User::class, 'user_id');
   }
    // Get the property type that owns the property.
   public function propertyType()
   {
	   return $this->belongsTo(PropertyType::class, 'type');
   }
}
