<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class PointPrice extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table='PointPrice';
    protected $fillable = ['point_count', 'price','currency'];


}
