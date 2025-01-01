<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

//auth
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role',
        'profile_image',
        'is_deleted',
        'governorate', 
    'about',
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



    public function conversations()
{
    return $this->hasMany(Conversation::class, 'user1_id')
        ->orWhere('user2_id', $this->id);
}

public function messages()
{
    return $this->hasMany(Message::class, 'sender_id');
}

}
