<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;


use App\Models\Listing;
use App\Models\Review; 
use App\Models\User; 
use App\Models\Favorite;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
   

    public function getRecentListings()
    {
        // Get the request parameters
        $offset = request()->query('offset', 0);
        $limit = request()->query('limit', 6);
        $ordertype = request()->query('ordertype', 'desc'); // Default to 'desc' if not provided
        $userId = request()->query('user_id'); // Get the user_id parameter

        // Fetch the total count of listings
        $totalCount = Listing::where('is_deleted', '0')
            ->when(request('price_min'), function ($query) {
                return $query->where('price', '>=', request('price_min'));
            })
            ->when(request('price_max'), function ($query) {
                return $query->where('price', '<=', request('price_max'));
            })
            ->when(request('bed'), function ($query) {
                $value = request('bed');
                if (in_array($value, [0, 1, 2, 3])) {
                    return $query->where('bed', $value);
                } else {
                    return $query->where('bed', '>', 3);
                }
            })
            ->when(request('bath'), function ($query) {
                $value = request('bath');
                if (in_array($value, [0, 1, 2, 3])) {
                    return $query->where('bath', $value);
                } else {
                    return $query->where('bath', '>', 3);
                }
            })
            ->when(request('sqft_min'), function ($query) {
                return $query->where('sqft', '>=', request('sqft_min'));
            })
            ->when(request('sqft_max'), function ($query) {
                return $query->where('sqft', '<=', request('sqft_max'));
            })
            ->when(request('location'), function ($query) {
                $locationValue = request('location');
                return $query->where('title', 'like', "%{$locationValue}%")
                             ->orWhere('description', 'like', "%{$locationValue}%")
                             ->orWhere('location', 'like', "%{$locationValue}%");
            })
            ->when(request('governorate'), function ($query) {
                return $query->where('governorate', request('governorate'));
            })
            ->count(); // Get the total count of records

        // Fetch the user's favorite count
        $favoriteCount = $userId 
            ? Favorite::where('user_id', $userId)->count()
            : 0;

        // Fetch the listings with the given parameters
        $listings = Listing::with([
            'features' => function ($query) {
                $query->where('is_deleted', '0');
            },
            'images' => function ($query) {
                $query->where('is_deleted', '0')->where('is_main', '1');
            },
            'reviews' => function ($query) {
                $query->where('is_deleted', '0')
                    ->selectRaw('listing_id, avg(rating) as average_rating')
                    ->groupBy('listing_id');
            }
        ])
        ->where('is_deleted', '0')
        ->when(request('price_min'), function ($query) {
            return $query->where('price', '>=', request('price_min'));
        })
        ->when(request('price_max'), function ($query) {
            return $query->where('price', '<=', request('price_max'));
        })
        ->when(request('bed'), function ($query) {
            $value = request('bed');
            if (in_array($value, [0, 1, 2, 3])) {
                return $query->where('bed', $value);
            } else {
                return $query->where('bed', '>', 3);
            }
        })
        ->when(request('bath'), function ($query) {
            $value = request('bath');
            if (in_array($value, [0, 1, 2, 3])) {
                return $query->where('bath', $value);
            } else {
                return $query->where('bath', '>', 3);
            }
        })
        ->when(request('sqft_min'), function ($query) {
            return $query->where('sqft', '>=', request('sqft_min'));
        })
        ->when(request('sqft_max'), function ($query) {
            return $query->where('sqft', '<=', request('sqft_max'));
        })
        ->when(request('location'), function ($query) {
            $locationValue = request('location');
            return $query->where('title', 'like', "%{$locationValue}%")
                         ->orWhere('description', 'like', "%{$locationValue}%")
                         ->orWhere('location', 'like', "%{$locationValue}%");
        })
        ->when(request('governorate'), function ($query) {
            return $query->where('governorate', request('governorate'));
        })
        ->orderBy('id', $ordertype) // Use the ordertype for ordering the results
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->each(function ($listing) use ($userId) {
            $listing->image_url = $listing->images->first()->image_url ?? null;
            $listing->average_rating = $listing->reviews->first()->average_rating ?? null;

            // Check if the listing is in the user's favorites
            if ($userId) {
                $favorite = Favorite::where('user_id', $userId)
                                    ->where('listing_id', $listing->id)
                                    ->first();

                $listing->is_favorite = $favorite ? true : false;
                $listing->favorite_id = $favorite ? $favorite->id : null; // Include favorite ID
            } else {
                $listing->is_favorite = false;
                $listing->favorite_id = null;
            }
        });

        return response()->json([
            'total_count' => $totalCount,
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
