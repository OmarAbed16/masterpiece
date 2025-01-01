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
    
    $listings = Listing::with(['images' => function ($query) {
        $query->where('is_main', '1')->where('is_deleted', '0');
    }])
    ->where('is_deleted', '0')
    ->get()
    ->map(function ($listing) {
       
        $listing->image_url = $listing->images->isNotEmpty() 
            ? $listing->images->first()->image_url 
            : null;
        return $listing;
    });

  
    return view('dashboard.property.PropertyList', compact('listings'));
}


    public function create()
    {
        return view('dashboard.property.PropertyAdd');
   
    }

    public function store(Request $request, $id)
    {
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:1000',
            'price' => 'required|numeric|min:0.01|max:10000',
            'location' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'bed' => 'required|integer|min:0',
            'bath' => 'required|integer|min:0',
            'sqft' => 'required|integer|min:10',
            'status' => 'required|string|in:active,inactive,archived',
            'property_images' => 'required|array|min:4|max:10', 
            'property_images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        
        $data['owner_id'] = $id;
    
        
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
    

    public function edit($id)
    {
        $property = Listing::find($id);
    
        if (!$property) {
            return redirect()->route('dashboard.property.index')->with('error', 'Property not found.');
        }
    
        $property->image_url = ListingImage::where('listing_id', $id)->get();
        $property->main_image = ListingImage::where('listing_id', $id)->where('is_deleted', "0")->where('is_main', "1")->value('image_url');
        $property->features = ListingFeature::where('listing_id', $id)->pluck('feature_value');
        $property->amenities = Amenity::where('listing_id', $id)->pluck('amenity_value');
        $property->owner=User::where('id', $property->owner_id)->get();
       //dd($property);
    
        return view('dashboard.property.PropertyEdit', compact('property'));
    }
    
    
   public function update(Request $request, $id)
{
    // Validate the incoming data
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|min:10|max:1000',
        'price' => 'required|numeric|min:0.01|max:10000',
        'location' => 'required|string|max:255',
        'governorate' => 'required|string',
        'bed' => 'required|integer|min:0',
            'bath' => 'required|integer|min:0',
            'sqft' => 'required|integer|min:10',
        'status' => 'required|in:active,inactive,archived',
        'property_images' => 'nullable|array|min:4|max:10',
        'property_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'features' => 'required|array',
        'amenities' => 'required|array',  
    ]);

    $property = Listing::findOrFail($id);
    $property->update($data);

    // Handle new images if any
    if ($request->hasfile('property_images')) {
        ListingImage::where('listing_id', $id)->update(['is_deleted' => '1']);

        foreach ($request->file('property_images') as $index => $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/properties'), $imageName);
            $imageUrl = "http://127.0.0.1:8000/assets/properties/" . $imageName;
            $isMain = ($index === 0) ? "1" : "0";

            ListingImage::create([
                'listing_id' => $property->id,
                'image_url' => $imageUrl,
                'is_main' => $isMain,
            ]);
        }
    }

    // Delete old features and amenities
    ListingFeature::where('listing_id', $id)->delete();
    Amenity::where('listing_id', $id)->delete();

    // Add new features with FontAwesome icons
    $features = $request->features;
    $featureIcons = [
        '0' => 'fa-couch',      // Living Room
        '1' => 'fa-utensils',   // Kitchen
        '2' => 'fa-heartbeat',  // Free Medical
        '3' => 'fa-fire',       // Fireplace
        '4' => 'fa-house',      // Residential
        '5' => 'fa-tv',         // TV Cable
    ];

    foreach ($features as $feature) {
        $featureIcon = $featureIcons[$feature] ?? 'fa-question';

        ListingFeature::create([
            'listing_id' => $property->id,
            'feature_name' => $featureIcon,
            'feature_value' => $feature,
        ]);
    }

    // Add new amenities with FontAwesome icons
    $amenities = $request->amenities;
    $amenityIcons = [
        '0' => 'fa-wifi',       // Internet
        '1' => 'fa-paw',        // Pets Allow
        '2' => 'fa-spa',        // Spa & Massage
        '3' => 'fa-tshirt',     // Laundry Room
        '4' => 'fa-dumbbell',   // Gym
        '5' => 'fa-bell',       // Alarm
    ];

    foreach ($amenities as $amenity) {
        $amenityIcon = $amenityIcons[$amenity] ?? 'fa-question';

        Amenity::create([
            'listing_id' => $property->id,
            'amenity_name' => $amenityIcon,
            'amenity_value' => $amenity,
        ]);
    }

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
