<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingManagementController extends Controller
{
    public function index()
    {
        $listings = Listing::where('is_deleted', 0)->get();
        return view('dashboard.listings.index', compact('listings'));
    }

    public function show($id)
    {
        $listing = Listing::where('is_deleted', 0)->findOrFail($id);
        return view('dashboard.listings.show', compact('listing'));
    }

    public function edit($id)
    {
        $listing = Listing::where('is_deleted', 0)->findOrFail($id);
        return view('dashboard.listings.edit', compact('listing'));
    }

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->is_deleted = 1;
        $listing->save();
        return redirect()->route('dashboard.listings.index');
    }
}
