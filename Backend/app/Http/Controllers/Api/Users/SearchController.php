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
       
        $offset = request()->query('offset', 0);
        $limit = request()->query('limit', 6);
        $ordertype = request()->query('ordertype', 'desc'); 
        $userId = request()->query('user_id');

        
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
                return $query->where(function ($query) use ($locationValue) {
                    $query->where('title', 'like', "%{$locationValue}%")
                          ->orWhere('description', 'like', "%{$locationValue}%")
                          ->orWhere('location', 'like', "%{$locationValue}%");
                });
            })
            ->when(request('governorate'), function ($query) {
                return $query->where('governorate', request('governorate'));
            })
            ->count(); 

     
        $favoriteCount = $userId 
            ? Favorite::where('user_id', $userId)->count()
            : 0;

    
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
            return $query->where(function ($query) use ($locationValue) {
                $query->where('title', 'like', "%{$locationValue}%")
                      ->orWhere('description', 'like', "%{$locationValue}%")
                      ->orWhere('location', 'like', "%{$locationValue}%");
            });
        })
        ->when(request('governorate'), function ($query) {
            return $query->where('governorate', request('governorate'));
        })
        ->orderBy('id', $ordertype) 
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
                $listing->favorite_id = $favorite ? $favorite->id : null; 
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
        $userId = $request->input('user_id');
        $favouriteId = $request->input('favourite_id');
        $listingId = $request->input('listing_id');
        $state = $request->input('state');
    
        if (!in_array($state, ['create', 'delete'])) {
            return response()->json(['error' => 'Invalid state parameter'], 400);
        }
    
        if ($state === 'create') {
            Favorite::create([
                'user_id' => $userId,
                'listing_id' => $listingId,
            ]);
        } elseif ($state === 'delete') {
            Favorite::where('user_id', $userId)
                ->where('listing_id', $listingId)
                ->delete();
        }
    
        $favoriteCount = Favorite::where('user_id', $userId)->count();
    
        return response()->json(['message' => 'Favorite status updated successfully', 'favorite_count' => $favoriteCount]);
    }
    
    


}
