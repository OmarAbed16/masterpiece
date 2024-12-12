<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'feature_name',
        'feature_value', // Add feature_value to fillable fields
        'is_deleted',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
