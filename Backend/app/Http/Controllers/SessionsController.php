<?php

namespace App\Http\Controllers;

Use Str;
Use Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class SessionsController extends Controller
{
    public function create()
    {
        return view('dashboard.login.create');
    }


   

    public function store()
    {
        $attributes = request()->validate([
            'email' => [
                'required',           
                'email',               
                'exists:users,email',  
                'max:255'            
            ],
            'password' => [
                'required',            
                'string',             
                'min:8',               
                'max:255',             
            ],
        ], [
            // Custom error messages for better feedback
            'email.exists' => 'The provided email address does not exist.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);
        

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        $user = auth()->user();

        if ($user->role !== 'admin' && $user->role !== 'superadmin') {
            auth()->logout(); 
            return redirect('admin/sign-in')->withErrors(['email' => 'You do not have access to this area.']);
        }

        session()->regenerate();

        return redirect('admin/dashboard');
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('admin/sign-in');
    }
}
