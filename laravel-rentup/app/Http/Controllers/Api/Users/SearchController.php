<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Review; 
use App\Models\User; 

class SearchController extends Controller
{
    /**
     * Fetch and render search results.
     *
     * @param int $offset
     * @param int $limit
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderSearch($offset = 0, $limit = 6)
    {
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
            $bedValue = request('bed');
            if (!is_numeric($bedValue) || $bedValue > 3) {
                return $query->where('bed', '>', 3);
            } else {
                return $query->where('bed', $bedValue);
            }
        })
        ->when(request('bath'), function ($query) {
            $bathValue = request('bath');
    if (!is_numeric($bathValue) || $bathValue > 3) {
        return $query->where('bath', '>', 3);
    } else {
        return $query->where('bath', $bathValue);
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
                         ->orWhere('description', 'like', "%{$locationValue}%");
        })
        ->when(request('governorate'), function ($query) {
            return $query->where('governorate', request('governorate'));
        })
        ->orderBy('id', 'DESC')
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->each(function ($listing) {
            $listing->image_url = $listing->images->first()->image_url ?? null;
            $listing->average_rating = $listing->reviews->first()->average_rating ?? null;
        });
    
        return response()->json($listings);
    }
    
}
