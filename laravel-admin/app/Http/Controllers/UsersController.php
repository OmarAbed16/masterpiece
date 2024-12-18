<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('is_deleted', '0')
        ->where('role', 'customer')
        ->get();
        return view('dashboard.profiles.users.profile-user', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user || $user->is_deleted) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        return view('dashboard.profiles.users.profile-user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
       
    
        // Get the user_id from the driver model
        $user_id = $id;
    
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\+?[0-9]{7,15}$/', // Example for phone validation
            'governorate' => 'required|string',
            'gender' => 'required|string'
        ]);
    
        // Update the user data in the users table
        $user = User::find($user_id);
        if ($user) {
            $user->name = $validated['name'];
            $user->phone = $validated['phone'];
            $user->governorate = $validated['governorate'];
            $user->gender = $validated['gender'];
            $user->save();
        }
    
     
        session()->flash('status', 'Update successful!');
            return redirect()->route('users.edit', $user_id);
    }
    

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user || $user->is_deleted) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        $user->is_deleted = '1';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.',
        ]);
    }
}
