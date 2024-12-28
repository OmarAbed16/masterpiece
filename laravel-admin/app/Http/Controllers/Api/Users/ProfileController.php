<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Listing;
use App\Models\Review; 
use App\Models\Favorite;
use App\Models\Booking;
use App\Models\User;
class ProfileController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find($request->user_id);

        // Verify old password
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'message' => 'Old password is incorrect.'
            ], 400);
        }


         // Check if the new password is the same as the old password
    if ($request->old_password === $request->new_password) {
        return response()->json([
            'message' => 'New password cannot be the same as the old password.'
        ], 400);
    }
    
        // Update to the new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password changed successfully.'
        ], 200);
    }






    public function update(Request $request)
    {
        // Validate the request body
        $validatedData = $request->validate([
            'userId' => 'required|integer|exists:users,id',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'about' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Adjust the validation as needed for your application
        ], [
            'phone.regex' => 'The phone number must only contain digits (0-9) and be between 10 and 15 characters long.',
        ]);
    
        try {
            // Find the user by ID
            $user = User::findOrFail($validatedData['userId']);
    
            // Update fields if provided
            if (isset($validatedData['name'])) {
                $user->name = $validatedData['name'];
            }
    
            if (isset($validatedData['phone'])) {
                $user->phone_number = $validatedData['phone'];
            }
    
            if (isset($validatedData['about'])) {
                $user->about = $validatedData['about'];
            }
    
            // Handle the image upload
            if (isset($validatedData['profile_image'])) {
                $image = $validatedData['profile_image'];
                $imageName = now()->format('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images'), $imageName);
                $user->profile_image = 'http://127.0.0.1:8000/assets/images/' . $imageName;
            }
    
            // Save the user
            $user->save();
    
            return response()->json(['message' => 'Profile updated successfully!', 'user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update profile!', 'error' => $e->getMessage()], 500);
        }
    }
    



    public function getReviews(Request $request)
    {
        $userId = $request->query('userId');
        if (!$userId) {
            return response()->json(['error' => 'User ID is required'], 400);
        }
    
        // Fetch the reviews related to the user
        $reviews = Review::where('user_id', $userId)
            ->with(['listing', 'listing.images' => function ($query) {
                $query->where('is_main', "1");
            }]) // Eager load listing with main images only
            ->get();
    
        return response()->json($reviews);
    }
    




    public function getUserFavouriteList(Request $request)
{
    $userId = $request->query('user_id');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID is required'], 400);
    }

    $favoriteCount = Favorite::where('user_id', $userId)->count();

    $listings = Favorite::where('user_id', $userId)
        ->with([
            'listing' => function ($query) {
                $query->where('is_deleted', '0')
                    ->with([
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
                    ]);
            }
        ])
        ->get()
        ->map(function ($favorite) {
            $listing = $favorite->listing;
            $listing->image_url = $listing->images->first()->image_url ?? null;
            $listing->average_rating = $listing->reviews->first()->average_rating ?? null;
            $listing->is_favorite = true;
            $listing->favorite_id = $favorite->id;
            return $listing;
        });

    if ($listings->isEmpty()) {
        return response()->json(['message' => 'No favorite listings found.'], 404);
    }

    return response()->json([
        'total_count' => $favoriteCount,
        'favorite_count' => $favoriteCount,
        'listings' => $listings
    ]);
}




public function getUserBookings(Request $request)
{
    $userId = $request->query('user_id');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID is required'], 400);
    }

    // Fetch the bookings related to the user
    $bookings = Booking::where('user_id', $userId)
        ->where('is_deleted', "0")
        ->with([
            'listing' => function ($query) {
                $query->where('is_deleted', '0')
                    ->with([
                        'features' => function ($query) {
                            $query->where('is_deleted', '0');
                        },
                        'images' => function ($query) {
                            $query->where('is_deleted', '0')->where('is_main', '1');
                        },
                        'reviews' => function ($query) {
                            $query->where('is_deleted', '0');
                        }
                    ]);
            }
        ])
        ->get()
        ->map(function ($booking) {
            // Fetch booking details
            $bookingDetails = [
                'booking_id' => $booking->id,
                'checkin' => $booking->checkin,
                'checkout' => $booking->checkout,
                'payment_value' => $booking->payment_value,
                'status' => $booking->status,
                'payment_status' => $booking->payment_status
            ];
     
            // Fetch listing details
            $listing = $booking->listing;
            $listingDetails = [
                'listing_id' => $listing->id,
                'title' => $listing->title,
                'location' => $listing->location,
                'price' => $listing->price,
                'image_url' => $listing->images->first()->image_url ?? null,
                'average_rating' => $listing->reviews->avg('rating') ?? null // Calculate average rating from the reviews
            ];
          
            // Fetch reviews for the booking, filtered by booking_id
            $reviewCount = $listing->reviews->where('booking_id', $booking->id)->count();

            // Fetch user details (assuming user is tied to the booking)
            $userDetails = [
                'user_id' => $booking->user_id,
                'name' => $booking->user->name,  // Assuming 'user' relationship exists
                'email' => $booking->user->email,
                'profile_picture' => $booking->user->profile_image ?? null
            ];

            // Return the full structured response
            return [
                'booking_details' => $bookingDetails,
                'listing_details' => $listingDetails,
                'review_count' => $reviewCount, // Return the count of reviews
                'user_details' => $userDetails
            ];
        });

    if ($bookings->isEmpty()) {
        return response()->json(['message' => 'No bookings found.', 'total_count' => $bookings->count()], 404);
    }

    return response()->json([
        'total_count' => $bookings->count(),
        'bookings' => $bookings
    ]);
}





public function addReview(Request $request)
{
    // Manually retrieve the query parameters
    $validated = [
        'user_id' => $request->query('user_id'),
        'booking_id' => $request->query('booking_id'),
        'listing_id' => $request->query('listing_id'),
        'rating' => $request->query('rating'),
        'review' => $request->query('review')
    ];

    // Validate the data
    if (empty($validated['user_id']) || !is_numeric($validated['user_id']) || !User::find($validated['user_id'])) {
        return response()->json(['error' => 'Valid user ID is required.'], 400);
    }

    if (empty($validated['booking_id']) || !is_numeric($validated['booking_id']) || !Booking::find($validated['booking_id'])) {
        return response()->json(['error' => 'Valid booking ID is required.'], 400);
    }

    if (empty($validated['listing_id']) || !is_numeric($validated['listing_id']) || !Listing::find($validated['listing_id'])) {
        return response()->json(['error' => 'Valid listing ID is required.'], 400);
    }

    if (empty($validated['rating']) || !is_numeric($validated['rating']) || $validated['rating'] < 1 || $validated['rating'] > 5) {
        return response()->json(['error' => 'Rating must be between 1 and 5.'], 400);
    }

    if (empty($validated['review']) || strlen($validated['review']) > 500) {
        return response()->json(['error' => 'Review text is required and must be less than 500 characters.'], 400);
    }

    try {
        // Check if the booking belongs to the user
        $booking = Booking::findOrFail($validated['booking_id']);
        if ($booking->user_id != $validated['user_id']) {
            return response()->json(['error' => 'You can only review your own bookings.'], 400);
        }

        // Ensure the listing_id matches the booking's associated listing
        if ($booking->listing_id != $validated['listing_id']) {
            return response()->json(['error' => 'The listing ID does not match the booking listing.'], 400);
        }

        // Create the review
        $review = new Review();
        $review->user_id = $validated['user_id'];
        $review->booking_id = $validated['booking_id'];
        $review->listing_id = $validated['listing_id'];
        $review->rating = $validated['rating'];
        $review->comment = $validated['review'];
        $review->save();

        // Return a success response
        return response()->json(['message' => 'Review added successfully!'], 200);

    } catch (\Exception $e) {
        // Return a failure response with error details
        return response()->json(['error' => 'Failed to add review', 'details' => $e->getMessage()], 500);
    }
}



public function getUserReviews(Request $request)
{
    $userId = $request->query('user_id');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID is required'], 400);
    }

    $reviews = Review::where('user_id', $userId)
        ->where('is_deleted', '0')
        ->orderBy('id', 'desc')
        ->get()
        ->map(function ($review) {
            $booking = Booking::where('id', $review->booking_id)->first();
            
            $bookingDetails = $booking ? [
                'booking_id' => $booking->id,
                'checkin' => $booking->checkin,
                'checkout' => $booking->checkout,
                'payment_value' => $booking->payment_value,
                'status' => $booking->status,
                'payment_status' => $booking->payment_status,
                'listing_id' => $booking->listing_id
            ] : null;

            $listing = $booking ? Listing::where('id', $booking->listing_id)->first() : null;
            
            $listingDetails = $listing ? [
                'listing_id' => $listing->id,
                'title' => $listing->title,
                'location' => $listing->location,
                'price' => $listing->price,
                'image_url' => $listing->images->first()->image_url ?? null
            ] : null;

            return [
                'review_id' => $review->id,
                'rating' => $review->rating,
                'comment' => $review->comment,
                'created_at' => $review->created_at,
                'booking_details' => $bookingDetails,
                'listing_details' => $listingDetails
            ];
        });

    if ($reviews->isEmpty()) {
        return response()->json(['message' => 'No reviews found.'], 404);
    }

    return response()->json([
        'total_count' => $reviews->count(),
        'reviews' => $reviews
    ]);
}







public function destroy($id)
{
    $Booking = Booking::find($id);

    if (!$Booking) {
        return response()->json(['success' => false], 404);
    }

    $Booking->is_deleted = '1';
    $Booking->save();

    return response()->json(['success' => true]);
}


}
