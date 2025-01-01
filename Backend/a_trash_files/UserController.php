<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_deleted', 0)->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::where('is_deleted', 0)->findOrFail($id);
        return view('users.show', compact('user'));
    }
}

