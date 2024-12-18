<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('is_deleted', 0)->get();
        return view('users.favorites.index', compact('favorites'));
    }

    public function show($id)
    {
        $favorite = Favorite::where('is_deleted', 0)->findOrFail($id);
        return view('users.favorites.show', compact('favorite'));
    }
}
