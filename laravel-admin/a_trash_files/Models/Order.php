<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id'; 
    protected $fillable = [
        'user_id',
        'driver_id',
        'truck_id',
        'quantity',
        'status',
        'payment_status',
        'payment_method',
        'address',
        'order_time',
        'delivery_time',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
        'order_time' => 'datetime',
        'delivery_time' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
