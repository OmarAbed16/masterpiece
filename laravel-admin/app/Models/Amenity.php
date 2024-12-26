<?php

// app/Models/Amenity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'amenity_name',
        'is_deleted',
        "amenity_value",
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class); // Relationship with listings table
    }
}
