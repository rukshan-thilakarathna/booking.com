<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRoles extends Model
{
    use HasFactory;
    protected $table='role_users';
    protected $fillable=['user_id','role_id'];
    public $timestamps = false;
}
