<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingManagementController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('is_deleted', 0)->get();
        return view('dashboard.bookings.index', compact('bookings'));
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
