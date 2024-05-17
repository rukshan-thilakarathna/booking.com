<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Access\UserAccess;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDate;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Filters\Types\WhereIn;
use Orchid\Filters\Types\WhereMaxMin;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Point_transactions extends Model
{
    use AsSource, HasFactory , Filterable;

    protected $table='point_transactions';

    protected $fillable=[
            'from',
            'to',
            'point_count',
            'discount_amount',
            'selling_status',
            'discount_percentage',
            'donations',
            'description',
            'amount',
            'transaction_date',
            'point_status'
    ];

    protected $allowedFilters = [
        'id'            => Where::class,
        'from'            => Where::class,
        'to'               => Where::class,
        'amount'        => Where::class,
        'discount_percentage'  => Like::class,
        'discount_amount'        => Like::class,
        'point_count'        => Like::class,
        'created_at'    => Like::class,
        'deleted_at'    => Like::class,
    ];

    protected $allowedSorts = [
        'id',
        'amount',
        'status',
        'discount_amount',
        'discount_percentage',
        'point_count',
        'created_at',
        'updated_at'
    ];


    public function ToUser()
    {
        return $this->belongsTo(User::class, 'to');
    }

    public function FromUser()
    {
        return $this->belongsTo(User::class, 'from');
    }
}
