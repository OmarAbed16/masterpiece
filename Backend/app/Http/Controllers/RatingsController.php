<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index()
    {
        $Reviews = Review::where('is_deleted', '0')->get();

        $Reviews->each(function ($rating) {
            // Get the order for the rating
            $rating->order = Booking::where('id', $rating->booking_id)

                ->first();

          
            $rating->listing = Listing::where('id', $rating->listing_id)
                ->first();

           
            $mainImage = ListingImage::where('listing_id', $rating->listing_id)
                ->where('is_main', '1')
                ->first();

            // If a main image exists, assign the image_url to main_page
            if ($mainImage) {
                $rating->main_image = $mainImage->image_url;
            }
        });


        return view('dashboard.reviews.reviews', compact('Reviews'));
    }

    
    
    
    
    

    public function create()
    {
        return view('orders.create');
    }

    

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,shipping,delivered,canceled',
            'payment_status' => 'required|in:completed,refunded,canceled',
        ]);

        $order->update($data);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
{
    $rating = Review::find($id);

    if (!$rating) {
        return response()->json(['success' => false], 404);
    }

    $rating->is_deleted = '1';
    $rating->save();

    return response()->json(['success' => true]);
}


    
}
