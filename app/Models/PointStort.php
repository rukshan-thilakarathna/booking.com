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

    protected $table='point_storts';
    protected $fillable = ['user_id', 'point_count'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
