<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\ListingFeature;
use App\Models\Amenity;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $listings = DB::table('listings')
        ->leftJoin('listing_images', function($join) {
            $join->on('listings.id', '=', 'listing_images.listing_id')
                 ->where('listing_images.is_main', '=', "1");
        })
        ->where('listings.is_deleted', '0')
        ->select('listings.*', 'listing_images.image_url')
        ->get();
    

        return view('dashboard.property.PropertyList', compact('listings'));
    }


    
    
    
    
    

    public function create()
    {
        return view('dashboard.property.PropertyAdd');
   
    }

    public function store(Request $request, $id)
    {
        // Validate the listing data and images
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:1000',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'bed' => 'required|integer',
            'bath' => 'required|integer',
            'sqft' => 'required|integer',
            'status' => 'required|string|in:active,inactive,archived',
            'property_images' => 'required|array|min:4|max:10', // Validate array size
            'property_images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each file
        ]);
    
        // Add the owner_id to the data
        $data['owner_id'] = $id;
    
        // Create a new Listing record in the database
        $listing = Listing::create($data);
    
        // Handle property images
        if ($request->hasfile('property_images')) {
            foreach ($request->file('property_images') as $index => $image) {
                // Generate a unique file name
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Move the image to the assets/properties directory
                $image->move(public_path('assets/properties'), $imageName);
    
                // Construct the full image URL
                $imageUrl = "http://127.0.0.1:8000/assets/properties/" . $imageName;
    
                $isMain = ($index === 0) ? "1" : "0";
                // Save the image record in the ListingImage model
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image_url' => $imageUrl,
                    'is_main' => $isMain,
                ]);
            }
        }
    
        // Redirect to the properties index with a success message
        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }
    
    

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $property = Listing::find($id);
    
        if (!$property) {
            return redirect()->route('dashboard.property.index')->with('error', 'Property not found.');
        }
    
        $property->image_url = ListingImage::where('listing_id', $id)->get();
        $property->main_image = ListingImage::where('listing_id', $id)->where('is_main', "1")->value('image_url');
        $property->features = ListingFeature::where('listing_id', $id)->pluck('feature_name');
        $property->amenities = Amenity::where('listing_id', $id)->pluck('amenity_name');
        $property->owner=User::where('id', $property->owner_id)->get();
        // dd($property);
    
        return view('dashboard.property.PropertyEdit', compact('property'));
    }
    
    
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'governorate' => 'required|string',
            'bed' => 'required|numeric',
            'bath' => 'required|numeric',
            'sqft' => 'required|numeric',
            'status' => 'required|in:active,inactive,archived',
        ]);
    
        // Find the property to be updated
        $property = Listing::findOrFail($id);
    
        // Update the property with the validated data
        $property->update($data);
    
        // Redirect back with success message
        return redirect()->route('properties.edit', ['property' => $property->id])->with('status', 'Property updated successfully.');
    }
    

    public function destroy($id)
{
    $Property = Listing::find($id);

    if (!$Property) {
        return response()->json(['success' => false], 404);
    }

    $Property->is_deleted = '1';
    $Property->save();

    return response()->json(['success' => true]);
}


    
}
