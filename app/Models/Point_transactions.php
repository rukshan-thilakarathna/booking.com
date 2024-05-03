<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_transactions extends Model
{
    use HasFactory;
    protected $table='point_transactions';
    protected $fillable=['from_user_id','to_user_id','point_count','discount','description','amount','transaction_date','point_status'];
}
