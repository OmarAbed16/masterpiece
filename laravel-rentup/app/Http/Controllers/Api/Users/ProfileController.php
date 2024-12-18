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
            'phone' => 'nullable|string|max:15',
            'about' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Adjust the validation as needed for your application
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
    

}
