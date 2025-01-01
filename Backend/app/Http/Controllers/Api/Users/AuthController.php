<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => [
            'required',
            'string',
            'min:8',
            'max:64',
            'regex:/[A-Z]/',    
            'regex:/[a-z]/',     
            'regex:/[0-9]/',      
            'regex:/[@$!%*?&]/',  
            'confirmed',          
        ]
    ], [
        'password.required' => 'Password is required.',
        'password.string' => 'Password must be a valid string.',
        'password.min' => 'Password must be at least 8 characters long.',
        'password.max' => 'Password must not exceed 64 characters.',
        'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        'password.confirmed' => 'Password confirmation does not match.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'profile_image' => "http://127.0.0.1:8000/assets/default_images/default_image.png",
        'phone_number' => "0787654321"
    ]);

    return response()->json([
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'profile_image' => $user->profile_image,
            'phone_number' => $user->phone_number,
            'about' => $user->about
        ]
    ], 201);
}

public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::where('email', $request->email)->first();


    if (!$user) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    if ($user->role != "user") {
        return response()->json([
            'message' => 'You do not have access to this area.'
        ], 403);  
    }


    if (Hash::check($request->password, $user->password)) {
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profile_image' => $user->profile_image, 
                'phone_number' => $user->phone_number, 
                'about' => $user->about   
            ]
        ], 200);
    }

    return response()->json([
        'message' => 'Invalid credentials'
    ], 401);
}


}
