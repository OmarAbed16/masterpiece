<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('is_deleted', 0)->get();
        return view('users.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::where('is_deleted', 0)->findOrFail($id);
        return view('users.bookings.show', compact('booking'));
    }
}

