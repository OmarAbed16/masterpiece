<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscribeController extends Controller
{
    /**
     * Add email to the subscriptions table if it doesn't already exist.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        // Validate the email
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $validatedData['email'];

        // Check if the email already exists in the subscriptions table
        if (Subscription::where('email', $email)->exists()) {
            return response()->json(['message' => 'Email already subscribed'], 200);
        }

        // Create a new subscription record
        Subscription::create(['email' => $email]);

        return response()->json(['message' => 'Subscription added successfully'], 201);
    }
}
