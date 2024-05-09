<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $table='districts';
    protected $fillable = [
        'url',
        'province_id',
        'name_en',
        'name_si',
        'name_ta'
    ];


}
