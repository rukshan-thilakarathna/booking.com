<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table='_reviews';
    protected $fillable=['property_id','rating','review_date','text','status'];
     // Get the properties that owns the review.
	
   public function properties()
   {
	   return $this->belongsTo(Properties::class, 'property_id');
   }
}
