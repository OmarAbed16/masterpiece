<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role',
        'profile_image',
        'is_deleted',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class, 'owner_id');
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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
