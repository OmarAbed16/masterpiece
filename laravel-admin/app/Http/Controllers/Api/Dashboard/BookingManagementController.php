<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User; 
use App\Models\Listing;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingManagementController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('is_deleted', "0")
            ->latest()
            ->take(3)
            ->get();

        $bookings->each(function ($booking) {
            $booking->client = $booking->user; 
        });

        return response()->json([
            'status' => 'success',
            'data' => $bookings
        ]);
    }

    public function show($id)
    {
        $booking = Booking::where('is_deleted', 0)->findOrFail($id);
        return view('dashboard.bookings.show', compact('booking'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->is_deleted = 1;
        $booking->save();
        return redirect()->route('dashboard.bookings.index');
    }
}
