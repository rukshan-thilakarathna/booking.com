<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Point extends Model
{
    use HasFactory;
    protected $table='users_point';
    protected $fillable=['user_id','point_count','amount','point_status'];
     // Get the user that owns the user points.
	
   public function userss()
   {
	   return $this->belongsTo(User::class, 'user_id');
   }
}
