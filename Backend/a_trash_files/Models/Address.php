<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_id',
        'entity_type',
        'location',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'entity_id')->where('entity_type', 'user');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'entity_id')->where('entity_type', 'driver');
    }
}
