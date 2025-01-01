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
        $user = User::find($request->user_id);
    
        $request->validate(
            [
                'user_id' => 'required|exists:users,id',
                'old_password' => [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail('Old password is incorrect.');
                        }
                    },
                ],
                'new_password' => [
                    'required',
                    'string',
                    'min:8',
                    'max:64',
                    'regex:/[A-Z]/',
                    'regex:/[a-z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*?&]/',
                    'different:old_password'
                ],
                'confirm_password' => 'required|same:new_password',
            ],
            [
                'new_password.required' => 'New password is required.',
                'new_password.string' => 'New password must be a valid string.',
                'new_password.min' => 'New password must be at least 8 characters long.',
                'new_password.max' => 'New password must not exceed 64 characters.',
                'new_password.regex' => 'New password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
                'new_password.different' => 'New password must be different from the old password.',
                'confirm_password.required' => 'Please confirm your new password.',
                'confirm_password.same' => 'Password confirmation does not match the new password.',
            ]
        );
    
        // Update to the new password
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return response()->json([
            'status' => 'success',
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
            'about' => 'nullable|string|max:500',
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
                        'images' => function ($query) {
                            $query->where('is_deleted', '0')->where('is_main', '1');
                        }
                    ]);
            }
        ])
        ->get()
        ->map(function ($favorite) {
            $listing = $favorite->listing;
            $listing->image_url = $listing->images->first()->image_url ?? null;
            $listing->is_favorite = true;
            $listing->favorite_id = $favorite->id;
            return $listing;
        });

    if ($listings->isEmpty()) {
        return response()->json(['message' => 'No favorite listings found.'], 404);
    }

    return response()->json([
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
                        'images' => function ($query) {
                            $query->where('is_deleted', '0')->where('is_main', '1');
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
                'payment_method' => $booking->payment_method,
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
                'image_url' => $listing->images->first()->image_url ?? null
                        ];

            $reviewCount = $listing->reviews->where('booking_id', $booking->id)->count();

            return [
                'booking_details' => $bookingDetails,
                'listing_details' => $listingDetails,
                'review_count' => $reviewCount
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
    
    $validated = [
        'user_id' => $request->input('user_id'),
        'booking_id' => $request->input('booking_id'),
        'listing_id' => $request->input('listing_id'),
        'rating' => $request->input('rating'),
        'review' => $request->input('review')
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


         // Check if the user has already reviewed this booking and listing
         $existingReview = Review::where('user_id', $validated['user_id'])
         ->where('booking_id', $validated['booking_id'])
         ->where('listing_id', $validated['listing_id'])
         ->first();

if ($existingReview) {
return response()->json(['error' => 'You have already submitted a review for this booking and listing.'], 400);
}


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


        return response()->json(['message' => 'Review added successfully!'], 200);

    } catch (\Exception $e) {
       
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
