<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_number',
        'adults',
        'children',
        '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19',
        '20', '21', '22', '23', '24', '25', '26', '27', '28',
        '29', '30', '31'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        '1' => 'integer',
        '2' => 'integer',
        '3' => 'integer',
        '4' => 'integer',
        '5' => 'integer',
        '6' => 'integer',
        '7' => 'integer',
        '8' => 'integer',
        '9' => 'integer',
        '10' => 'integer',
        '11' => 'integer',
        '12' => 'integer',
        '13' => 'integer',
        '14' => 'integer',
        '15' => 'integer',
        '16' => 'integer',
        '17' => 'integer',
        '18' => 'integer',
        '19' => 'integer',
        '20' => 'integer',
        '21' => 'integer',
        '22' => 'integer',
        '23' => 'integer',
        '24' => 'integer',
        '25' => 'integer',
        '26' => 'integer',
        '27' => 'integer',
        '28' => 'integer',
        '29' => 'integer',
        '30' => 'integer',
        '31' => 'integer',
    ];

    // You can add relationships and custom methods here if needed
}
