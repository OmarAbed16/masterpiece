<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profiles.admins.profile-admin');
    }

   

    public function edit()
    {

        $user = request()->user();
        
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'about' => 'nullable|string|max:500',
            'governorate' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'phone_number.regex' => 'The phone number must only contain digits (0-9) and be between 10 and 15 characters long.',
        ]);
        
        if (request()->hasFile('profile_image')) {
            $image = request()->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $imageName);
            $attributes['profile_image'] =  "http://127.0.0.1:8000/assets/images/".$imageName;
        }
        
        $user->update($attributes);
        return back()->withStatus('Profile successfully updated.');
        
}
}
