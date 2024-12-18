<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;
use App\Models\Booking;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Users
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed Listings
        $listing1 = Listing::create([
            'title' => 'Cozy Apartment in City Center',
            'description' => 'A nice place to stay with all amenities.',
            'price' => 100,
            'owner_id' => $user1->id, // Set the owner_id to user1
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $listing2 = Listing::create([
            'title' => 'Luxury Villa with Pool',
            'description' => 'A beautiful villa with a pool and garden.',
            'price' => 250,
            'owner_id' => $user2->id, // Set the owner_id to user2
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed Bookings
        Booking::create([
            'user_id' => $user1->id,
            'listing_id' => $listing1->id,
            'status' => 'confirmed',
            'payment_method' => 'paypal',
            'payment_status' => 'paid',
            'is_deleted' => false,
            'end_date' => Carbon::parse('2024-12-18 20:20:28'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Booking::create([
            'user_id' => $user2->id,
            'listing_id' => $listing2->id,
            'status' => 'pending',
            'payment_method' => 'cash',
            'payment_status' => 'pending',
            'is_deleted' => false,
            'end_date' => Carbon::parse('2024-12-25 20:20:28'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
