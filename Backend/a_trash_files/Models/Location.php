<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_id',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /**
     * Relationships
     */
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
