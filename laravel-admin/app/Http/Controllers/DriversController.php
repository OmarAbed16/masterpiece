<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use App\Models\Truck;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index()
{
    // Join drivers with users and trucks tables to get driver, user, and truck info
    $drivers = Driver::join('users', 'drivers.user_id', '=', 'users.id')
        ->leftJoin('trucks', 'drivers.driver_id', '=', 'trucks.driver_id') 
        ->where('drivers.is_deleted', '0')
        ->where('users.is_deleted', '0')
        ->select(
            'drivers.*', 
            'users.name', 
            'users.email', 
            'users.phone',
            'users.governorate',
            'users.profile_image',
            'users.created_at',
            'trucks.license_plate as truck_license_plate', // Select truck details
            'trucks.company_name as company',
            'trucks.capacity as truck_capacity',
            'trucks.current_load as truck_load',
            'trucks.status as truck_status'
        )
        ->get();

    return view('dashboard.profiles.drivers.profile-driver', compact('drivers'));
}



public function show($id)
{
    $driver = Driver::find($id);

    if (!$driver) {
        return redirect()->route('drivers.index')->with('error', 'Driver not found.');
    }

    return view('drivers.show', compact('driver'));
}


public function edit($driver_id)
{
    $driver = Driver::join('users', 'drivers.user_id', '=', 'users.id')
        ->leftJoin('trucks', 'drivers.driver_id', '=', 'trucks.driver_id')
        ->where('drivers.driver_id', $driver_id)
        ->select(
            'drivers.*', 
            'users.name', 
            'users.email', 
            'users.phone',
            'users.role',
            'users.about',
            'users.governorate',
            'users.profile_image',
            'users.created_at',
            'trucks.license_plate as truck_license_plate',
            'trucks.company_name as company',
            'trucks.capacity as truck_capacity',
            'trucks.current_load as truck_load',
            'trucks.status as truck_status'
        )
        ->first();

    if (!$driver) {
        return redirect()->route('drivers.edit')->with('error', 'Driver not found.');
    }

    return view('dashboard.profiles.drivers.profile-driver-edit', compact('driver'));
}




public function update(Request $request, $driver_id)
{
    // Find the driver by driver_id
    $driver = Driver::find($driver_id);

    if (!$driver) {
        session()->flash('demo', 'Update Failed!');
        return redirect()->route('drivers.edit', $driver_id);
    }

    // Get the user_id from the driver model
    $user_id = $driver->user_id;

    // Validate the input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|regex:/^\+?[0-9]{7,15}$/', // Example for phone validation
        'governorate' => 'required|string',
        'national_number' => 'required|string|max:20',
        'national_number_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'driver_license_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'gas_license_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'truck_license_plate' => 'nullable|string|max:255', // Make truck_license_plate nullable if it's optional
    ]);

    // Update the user data in the users table
    $user = User::find($user_id);
    if ($user) {
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->governorate = $validated['governorate'];
        $user->save();
    }

    // Update the driver data
    $driver->national_number = $validated['national_number'];

   // Ensure the directory exists
$directory = public_path('assets/img/images');
if (!file_exists($directory)) {
    mkdir($directory, 0755, true);
}

// Handle the file uploads for images
if ($request->hasFile('national_number_image')) {
    $nationalNumberImage = $request->file('national_number_image');
    $extension = $nationalNumberImage->getClientOriginalExtension();
    $nationalNumberImageName = time() . '.' . $extension;
    $nationalNumberImage->move($directory, $nationalNumberImageName);
    $driver->national_number_image = $nationalNumberImageName;
}

if ($request->hasFile('driver_license_image')) {
    $driverLicenseImage = $request->file('driver_license_image');
    $extension = $driverLicenseImage->getClientOriginalExtension();
    $driverLicenseImageName = time() . '.' . $extension;
    $driverLicenseImage->move($directory, $driverLicenseImageName);
    $driver->driver_license_image = $driverLicenseImageName;
}

if ($request->hasFile('gas_license_image')) {
    $gasLicenseImage = $request->file('gas_license_image');
    $extension = $gasLicenseImage->getClientOriginalExtension();
    $gasLicenseImageName = time() . '.' . $extension;
    $gasLicenseImage->move($directory, $gasLicenseImageName);
    $driver->gas_license_image = $gasLicenseImageName;
}

    // If truck license plate is provided, update it in the truck table
    if ($validated['truck_license_plate']) {
        // Find the truck associated with the driver
        $truck = Truck::where('driver_id', $driver_id)->first();
        if ($truck) {
            $truck->license_plate = $validated['truck_license_plate'];
            $truck->save();
        }
    }

    // Save the updated driver data
    $driver->save();

    session()->flash('status', 'Update successful!');
        return redirect()->route('drivers.edit', $driver_id);
}





public function destroy($id)
{
    $driver = Driver::find($id);

    if (!$driver) {
        return response()->json([
            'success' => false
        ], 404);
    }

    $user = User::find($driver->user_id);

    if ($user) {
        $user->is_deleted = '1';
        $user->save();
    }

    $driver->is_deleted = '1';
    $driver->save();

    return response()->json([
        'success' => true
    ]);
}


    
}
