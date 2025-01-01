<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('is_deleted', '0')
        ->where('role', 'user')
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
       
    
        
        $user_id = $id;
    
     
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'governorate' => 'required|string',
            'gender' => 'required|string'
        ], [
            'phone_number.regex' => 'The phone number must only contain digits (0-9) and be between 10 and 15 characters long.',
        ]);
    
       
        $user = User::find($user_id);
        if ($user) {
            $user->name = $validated['name'];
            $user->phone_number = $validated['phone_number'];
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
