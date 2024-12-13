<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;


use App\Models\Listing;
use App\Models\Review; 
use App\Models\User; 
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
   

    public function getRecentListings()
{
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

    $recentListings->each(function($listing) {
        $listing->image_url = $listing->images->first()->image_url ?? null;
    });

    return response()->json($recentListings);
}

public function getUsers()
{
    $useritems = User::where('role', '!=', 'user')
                ->where('is_deleted', '0')
                ->limit(4)
                ->get();

    return response()->json($useritems);
}

public function getRecentReviews()
{
    $recentReviews = Review::with('user')
        ->where('is_deleted', '0')
        ->orderBy('id', 'DESC')
        ->limit(5)
        ->get();

    $recentReviews->each(function($review) {
        $review->user_image = $review->user->profile_image ?? null;
        $review->user_name = $review->user->name ?? 'Unknown';
    });

    return response()->json($recentReviews);
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
