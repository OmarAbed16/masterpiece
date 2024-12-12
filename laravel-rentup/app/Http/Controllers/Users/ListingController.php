<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Review;  // Import the Review model
use App\Models\Partner; // Import the Partner model
use App\Models\User; 
use Illuminate\Http\Request;

class ListingController extends Controller
{
   

    public function landing()
{
    // Fetch recent listings
    $recentListings = Listing::with([
        'features' => function($query) {
            $query->where('is_deleted', '0');
        },
        'images' => function($query) {
            $query->where('is_deleted', '0')->where('is_main', '1');
        }
    ])
    ->where('is_deleted', '0')
    ->orderBy('id', 'DESC')
    ->limit(6)
    ->get();

    // Get the first main image URL or null if no image exists
    $recentListings->each(function($listing) {
        $listing->image_url = $listing->images->first()->image_url ?? null;
    });

    // Fetch users where role != 'user' and is_deleted = '0', limit to 6
    $useritems = User::where('role', '!=', 'user')
                ->where('is_deleted', '0')
                ->limit(6)
                ->get();


                // Fetch the last 5 reviews where is_deleted = '0'
                $recentReviews = Review::with('user') // Assuming there's a relationship 'user' on the Review model
                ->where('is_deleted', '0')
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        
            // Adding user image and name to each review
            $recentReviews->each(function($review) {
                $review->user_image = $review->user->profile_image ?? null;  // Assuming user has an 'image_url' field
                $review->user_name = $review->user->name ?? 'Unknown';   // Assuming user has a 'name' field
            });

    return view('users.landing', compact('recentListings', 'useritems','recentReviews'));  // Passing the users data
}

    
    public function search(){
         // Fetch recent listings
    $recentListings = Listing::with([
        'features' => function($query) {
            $query->where('is_deleted', '0');
        },
        'images' => function($query) {
            $query->where('is_deleted', '0')->where('is_main', '1');
        }
    ])
    ->where('is_deleted', '0')
    ->orderBy('id', 'DESC')
    ->limit(6)
    ->get();

    // Get the first main image URL or null if no image exists
    $recentListings->each(function($listing) {
        $listing->image_url = $listing->images->first()->image_url ?? null;
    });




    return view('users.search', compact('recentListings')); 
    }
    
    
    

    



    public function show($id)
    {
        $listing = Listing::where('is_deleted', 0)->findOrFail($id);
        return view('users.listings.show', compact('listing'));
    }
}
