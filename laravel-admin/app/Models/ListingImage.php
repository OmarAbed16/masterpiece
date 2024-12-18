<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'image_url',
        'is_deleted',
        'is_main', // Add the new column here
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
        'is_main' => 'boolean', // Cast the new column to boolean
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
