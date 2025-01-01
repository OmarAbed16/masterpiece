<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;


use App\Models\{
    Listing,
    Review,
    User,
    Favorite
};
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
   

    public function getRecentListings()
    {
      
        $offset = request()->query('offset', 0);
        $limit = request()->query('limit', 6);
        $ordertype = request()->query('ordertype', 'desc');
        $userId = request()->query('user_id');

        // Fetch the user's favorite count
        $favoriteCount = $userId 
            ? Favorite::where('user_id', $userId)->count()
            : 0;

        // Fetch the listings with the given parameters
        $listings = Listing::with([
            
            'images' => function ($query) {
                $query->where('is_deleted', '0')->where('is_main', '1');
            }
        ])
        ->where('is_deleted', '0')
        ->orderBy('id', $ordertype) 
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->each(function ($listing) use ($userId) {
            $listing->image_url = $listing->images->first()->image_url ?? null;

            // Check if the listing is in the user's favorites
            if ($userId) {
                $favorite = Favorite::where('user_id', $userId)
                                    ->where('listing_id', $listing->id)
                                    ->first();

                $listing->is_favorite = $favorite ? true : false;
                $listing->favorite_id = $favorite ? $favorite->id : null; 
            } else {
                $listing->is_favorite = false;
                $listing->favorite_id = null;
            }
        });

        return response()->json([
            'favorite_count' => $favoriteCount,
            'listings' => $listings
        ]);
    }

public function getUsers()
{
    $useritems = User::where('role', '!=', 'user')
                ->where('is_deleted', '0')
                ->limit(6)
                ->get();

    return response()->json($useritems);
}

public function getRecentReviews()
{
    $recentReviews = Review::with('user')
        ->where('is_deleted', '0')
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->get();

    $recentReviews->each(function($review) {
        $review->user_image = $review->user->profile_image ?? null;
        $review->user_name = $review->user->name ?? 'Unknown';
    });

    return response()->json($recentReviews);
}
    
}
