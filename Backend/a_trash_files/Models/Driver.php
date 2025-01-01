<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    use HasFactory;
    protected $primaryKey = 'driver_id'; 
    protected $fillable = [
        'user_id',
        'national_number',
        'national_number_image',
        'driver_license_image',
        'gas_license_image',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
}
