<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    protected $table='property_type';
    protected $fillable=['name','status'];
    public function properties()
	{
		return $this->hasMany(Properties::class);
	}
}
