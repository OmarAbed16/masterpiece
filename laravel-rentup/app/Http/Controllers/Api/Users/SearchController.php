<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Review; 
use App\Models\User; 
use App\Models\Favorite;

class SearchController extends Controller
{
    /**
     * Fetch and render search results.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderSearch()
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
                return $query->where('bed', $this->getBedValue(request('bed')));
            })
            ->when(request('bath'), function ($query) {
                return $query->where('bath', $this->getBathValue(request('bath')));
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
            return $query->where('bed', $this->getBedValue(request('bed')));
        })
        ->when(request('bath'), function ($query) {
            return $query->where('bath', $this->getBathValue(request('bath')));
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



    public function setFavourite(Request $request)
    {
        // Retrieve parameters from the request
        $userId = $request->query('user_id');
        $favouriteId = $request->query('favourite_id');
        $listingId = $request->query('listing_id');
        $state = $request->query('state');
    
        // Validate incoming request data
        if (!in_array($state, ['create', 'delete'])) {
            return response()->json(['error' => 'Invalid state parameter'], 400);
        }
    
        // Process based on the state
        if ($state === 'create') {
            // Logic to add to favourites
            Favorite::create([
                'user_id' => $userId,
                'listing_id' => $listingId,
            ]);
        } elseif ($state === 'delete') {
            // Logic to remove from favourites
            Favorite::where('user_id', $userId)
                ->where('listing_id', $listingId)
                ->delete();
        }
    
        return response()->json(['message' => 'Favorite status updated successfully']);
    }


}
