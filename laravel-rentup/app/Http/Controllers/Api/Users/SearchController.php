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
    public function renderSearch()
{
    // Get the request parameters
    $offset = request()->query('offset', 0);
    $limit = request()->query('limit', 6);

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
    ->orderBy('id', 'DESC')
    ->offset($offset)
    ->limit($limit)
    ->get()
    ->each(function ($listing) {
        $listing->image_url = $listing->images->first()->image_url ?? null;
        $listing->average_rating = $listing->reviews->first()->average_rating ?? null;
    });

    return response()->json([
        'total_count' => $totalCount,
        'listings' => $listings
    ]);
}

protected function getBedValue($bedValue)
{
    if (!is_numeric($bedValue) || $bedValue > 3) {
        return 3; // Default to 3 if the value is not numeric or greater than 3
    } else {
        return $bedValue;
    }
}

protected function getBathValue($bathValue)
{
    if (!is_numeric($bathValue) || $bathValue > 3) {
        return 3; // Default to 3 if the value is not numeric or greater than 3
    } else {
        return $bathValue;
    }
}

    
}
