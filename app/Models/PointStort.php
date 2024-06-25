<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class PointStort extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table='pointStorts';
    protected $fillable = ['user_id', 'point_count','locked_points'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
