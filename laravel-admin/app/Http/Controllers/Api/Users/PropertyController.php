<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Review; 
use App\Models\Favorite;
use App\Models\Booking;
class PropertyController extends Controller
{
    /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProperty($id)
    {
        $property = Listing::with([
            'features',
            'images' => function ($query) {
                $query->where('is_deleted', '0');
            },
            'reviews',
            'owner',
            'amenities' => function ($query) {
                $query->where('is_deleted', '0');
            },
            'reviews.user' // Eager load the user relationship for the reviews
        ])->where('is_deleted', '0')->find($id);
        
        if (!$property) {
            return response()->json(['error' => 'Property not found'], 404);
        }
    


          // Retrieve the userId from the request
    $userId = request()->input('userId', 0); // Get the user ID from the request, default to 0 if not present

    // Check if the user has marked this property as favourite
    $isFavourite = Favorite::where('user_id', $userId)
                            ->where('listing_id', $id)
                            ->exists();
                            $favouriteCount = Favorite::where('user_id', $userId)->count();


        $reviews = $property->reviews()->where('is_deleted', '0');
        $avgRating = $reviews->avg('rating'); 
        $reviewsCount = $reviews->count();
        $latestReviews = $reviews->with('user')->latest()->take(4)->get();
// Attach the calculated data to the property object
$property->avg_rating = number_format($avgRating, 1); // Optional: format to 1 decimal
$property->reviews_count = $reviewsCount;
$property->latest_reviews = $latestReviews;
$property->isFavourite = $isFavourite; 
        $ownerId = $property->owner->id;
        $property->favourite_count = $favouriteCount;
       
        $listingIds = Listing::where('owner_id', $ownerId)
            ->where('is_deleted', '0')
            ->pluck('id');  
    
  
        $reviewsSummary = Review::whereIn('listing_id', $listingIds)
            ->selectRaw('AVG(rating) as averageRating, COUNT(*) as reviewCount')
            ->where('is_deleted', '0')
            ->first();
    
       
        $property->ownerReviews = $reviewsSummary;
    
        return response()->json($property);
    }
    
    public function createBooking(Request $request)
    {
        $totalPrice = $request->input('totalPrice');
        $checkinDate = $request->input('checkin');
        $checkoutDate = $request->input('checkout');
        $propertyId = $request->input('propertyId');
        $userId = $request->input('urlParamId');
        $paymentType = $request->input('paymentType');

    
        if (!$userId) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    
        // Check if the listing (property) exists
        $property = Listing::find($propertyId);
        if (!$property) {
            return response()->json(['error' => 'Property not found'], 404);
        }
    
   
        
        try {
            $booking = Booking::create([
                'user_id' => $userId,
                'listing_id' => $propertyId, // Use listing_id instead of property_id
                'status' => 'pending',
                'payment_method' => $paymentType,
                'payment_status' => $paymentType === 'cash' ? 'pending' : 'completed',
                'payment_value' => $totalPrice,
                'checkin' => $checkinDate,
                'checkout' => $checkoutDate,
            ]);
    
            return response()->json(['success' => 'Booking created successfully', 'booking' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create booking', 'message' => $e->getMessage()], 500);
        }
    }
    
    
    
}
