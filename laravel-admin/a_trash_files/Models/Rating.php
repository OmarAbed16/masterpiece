<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    use HasFactory;
    protected $primaryKey = 'rating_id';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'driver_id',
        'customer_id',
        'rating',
        'feedback',
        'rating_date',
        'is_deleted',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
        'rating_date' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
