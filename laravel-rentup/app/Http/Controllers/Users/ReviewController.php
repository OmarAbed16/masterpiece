<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('is_deleted', 0)->get();
        return view('users.reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::where('is_deleted', 0)->findOrFail($id);
        return view('users.reviews.show', compact('review'));
    }
}
