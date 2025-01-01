<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscribeController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $validatedData['email'];

        if (Subscription::where('email', $email)->exists()) {
            return response()->json(['message' => 'Email already subscribed'], 200);
        }

        Subscription::create(['email' => $email]);

        return response()->json(['message' => 'Subscription added successfully'], 201);
    }
}
