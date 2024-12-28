<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'location',
        'governorate',
    'bed',
    'bath',
    'sqft',
        'owner_id',
        'is_deleted',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
    ];

    public function amenities()
    {
        return $this->hasMany(Amenity::class);
    }
    
    public function owner()
{
    return $this->belongsTo(User::class, 'owner_id');
}

    
    public function features()
    {
        return $this->hasMany(ListingFeature::class);
    }
    
    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
  
}
