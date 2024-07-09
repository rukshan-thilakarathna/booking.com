<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'email',
        'main_location',
        'sub_location',
        'address',
        'service',
        'password',
        'br_image',
        'nic_or_passport_front_image',
        'nic_or_passport_back_image',
        'profile_verified',
        'role',
        'mobile_number',
        'nic_or_passport_number',
        'profile_image',
        'status',
    ];


    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }
    public function payament()
    {
        return $this->hasMany(Payment::class);
    }
    public function properties()
    {
        return $this->hasMany(Properties::class);
    }
    public function userPoint()
    {
        return $this->hasMany(Users_Point::class);
    }



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    public function IsIsRoot()
    {
        $userId = Auth::id();

            $role = UserHasRoles::where('user_id', $userId)->first();
            if ($role->role_id == 1) {
                return true;
            } else {
                return false;
            }

    }

 

}
