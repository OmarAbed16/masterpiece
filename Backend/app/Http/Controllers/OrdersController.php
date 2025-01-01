<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\ListingFeature;
use App\Models\Amenity;
class OrdersController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('is_deleted', '0')->get();

        $bookings->each(function ($booking) {
            $booking->user = User::where('id', $booking->user_id)
                ->where('is_deleted', '0')
                ->where('role', 'user')
                ->first();

            $booking->listing = Listing::where('id', $booking->listing_id)
                ->where('is_deleted', '0')
                ->with(['images', 'features', 'amenities'])
                ->first();


                $booking->main_image = ListingImage::where('listing_id', $booking->listing_id)
                ->where('is_deleted', '0')
                ->where('is_main', '1')
                ->value("image_url");
        

                

        });

   

        return view('dashboard.orders.orders', compact('bookings'));
    }

   

    public function edit($id)
    {
        $Booking = Booking::where('is_deleted', '0')->get();

        $Booking->each(function ($Booking) {
            $Booking->user = User::where('id', $Booking->user_id)
                ->where('is_deleted', '0')
                ->where('role', 'user')
                ->first();

            $Booking->listing = Listing::where('id', $Booking->listing_id)
                ->where('is_deleted', '0')
                ->with(['images', 'features', 'amenities'])
                ->first();


                $Booking->main_image = ListingImage::where('listing_id', $Booking->listing_id)
                ->where('is_deleted', '0')
                ->where('is_main', '1')
                ->value("image_url");
        

                

        });

   

  $Booking=$Booking[0];
        return view('dashboard.orders.orders-edit', compact('Booking'));
    }



    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'payment_value' => 'required|numeric|min:0',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'payment_status' => 'required|in:pending,completed,failed',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);
    
        // Find the booking by ID
        $booking = Booking::find($id);
    
        if (!$booking || $booking->is_deleted) {
            return redirect()->back()->withErrors(['error' => 'Booking not found or has been deleted.']);
        }
    
        // Update the booking fields
        $booking->payment_value = $validatedData['payment_value'];
        $booking->checkin = $validatedData['checkin'];
        $booking->checkout = $validatedData['checkout'];
        $booking->payment_status = $validatedData['payment_status'];
        $booking->status = $validatedData['status'];
    
        // Save the updated booking
        $booking->save();
    
        // Redirect with success message
        return redirect()->route('orders.index')->with('success', 'Booking updated successfully.');
    }



public function destroy($id)
    {
        $Book = Booking::find($id);

        if (!$Book || $Book->is_deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found.',
            ], 404);
        }

        $Book->is_deleted = '1';
        $Book->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted successfully.',
        ]);
    }



}
