<?php

namespace App\Http\Controllers;

Use Str;
Use Hash;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class RegisterController extends Controller
{


    public function User_login()
    {
        return view('register.create');
    }
 public function create()
    {
        return view('user.login.index');
    }
    public function store()
    {
        $validator = \Validator::make(request()->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
            ],
            'passwordMatch' => [
                'required',
                'string',
                'min:8',
                'max:20',
            ],
            'role' => [
                'required',
                'in:customer,driver', // Ensure the role is either "customer" or "driver"
            ],
            'is_deleted' => [
                'required',
                'in:0,1', // Ensure is_deleted is either "0" or "1"
            ],
        ], [
            'name.required' => 'Please enter your username.',
            'name.max' => 'Your username may not exceed 255 characters.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Your email may not exceed 255 characters.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password may not exceed 20 characters.',
            'passwordMatch.required' => 'Please confirm your password.',
            'passwordMatch.min' => 'Password confirmation must be at least 8 characters.',
            'passwordMatch.max' => 'Password confirmation may not exceed 20 characters.',
            'role.required' => 'Please select a user type (Customer or Driver).',
            'role.in' => 'Role must be "customer" or "driver".',
        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode("<br>", $errors);
            
            return response()->json([
                'result' => "signupErrorMessage.innerHTML ='".$errorMessage."'"
            ]);
        }
    
        // Password match validation
        if (request()->input('password') !== request()->input('passwordMatch')) {
            return response()->json([
                'result' => "signupErrorMessage.innerHTML ='The password confirmation does not match.'"
            ]);
        }
    
        // Create the user
        $user = new User();
        $user->name = request()->input('name');
        $user->email = request()->input('email');
        $user->password = request()->input('password'); 
        $user->role = request()->input('role');
        $user->profile_image = '1732907275.png';
        $user->is_deleted = request()->input('is_deleted');
        $user->email_verified_at = $user->is_deleted == "0" ? now() : null;
        $user->save();
    
        // Create the driver
        if ($user->role == 'driver') {
            $driver = new Driver();
            $driver->user_id = $user->id; 
            $driver->national_number  = $user->id; 
            $driver->national_number_image  ='1732345124.png'; 
            $driver->driver_license_image  = '1732345430.png'; 
            $driver->gas_license_image  = '1732345496.png'; 
            $driver->is_deleted = request()->input('is_deleted');
            $driver->save();
        }

        // Log the user in
        auth()->login($user);
    
        // Return success response
        return response()->json([
            'result' => "
    signupErrorMessage.innerHTML = '<span style=\"color:green;\">Registration successful! Redirecting in 2 seconds...</span>';
    setTimeout(() => {
        window.location.href = '/admin/dashboard';
    }, 2000);
"
        ]);
    }



    public function check()
    {
        // Validate the incoming data (email and password)
        $validator = \Validator::make(request()->all(), [
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
            ]
        ], [
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password may not exceed 20 characters.',
        ]);
    
        // If validation fails, return the error message
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode("<br>", $errors);
            return response()->json([
                'result' => "loginErrorMessage.innerHTML ='" . $errorMessage . "'"
            ]);
        }
    
        // Check if the user exists in the users table
        $user = User::where('email', request()->input('email'))->first();
    
        if (!$user) {
            return response()->json([
                'result' => "loginErrorMessage.innerHTML = '<span style=\"color:red;\">This email is not registered. Please check and try again.</span>'"
            ]);
        }
    
        // Check if the password matches the stored password
        if (!\Hash::check(request()->input('password'), $user->password)) {
            return response()->json([
                'result' => "loginErrorMessage.innerHTML = '<span style=\"color:red;\">Incorrect password. Please try again.</span>'"
            ]);
        }
    
        // Attempt to log the user in using the credentials
        auth()->login($user);
    
        // If successful, redirect to the dashboard or a specific page
        return response()->json([
            'result' => "
                loginErrorMessage.innerHTML = '<span style=\"color:green;\">Login successful! Redirecting in 2 seconds...</span>';
                setTimeout(() => {
                    window.location.href = '/admin/dashboard'; 
                }, 2000);
            "
        ]);
    }
    
    
 
}
