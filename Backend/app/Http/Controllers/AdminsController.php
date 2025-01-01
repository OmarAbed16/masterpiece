<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
{
    $users = User::where('is_deleted', '0')
    ->where('role', 'admin')
    ->get();
    return view('dashboard.profiles.employees.profile-admin', compact('users'));
}

public function edit($id)
    {
        $user = User::find($id);

        if (!$user || $user->is_deleted) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        return view('dashboard.profiles.employees.profile-admin-edit', compact('user'));
    }

public function destroy($id)
    {
        $user = User::find($id);

        if (!$user || $user->is_deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Admin not found.',
            ], 404);
        }

        $user->is_deleted = '1';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Admin deleted successfully.',
        ]);
    }


    
}
