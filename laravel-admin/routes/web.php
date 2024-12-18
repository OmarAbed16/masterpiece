<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ProfileController,
    RegisterController,
    SessionsController,
    DriversController,
    UsersController,
    OrdersController,
    RatingsController
};


Route::get('/notifications', function () {
    return view('user.login.notifications'); // Replace 'notifications' with the name of your Blade view file.
});


// Guest Routes
Route::middleware('guest')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::redirect('/', 'sign-in');
        Route::get('sign-in', [SessionsController::class, 'create'])->name('admin.login');
        Route::post('sign-in', [SessionsController::class, 'store']);
        
       });

    // Additional prefixes for other user types can be added here later (e.g., 'users/', 'drivers/')
    Route::prefix('user')->group(function () {
        Route::redirect('/', 'sign-in');
        Route::get('sign-in', [RegisterController::class, 'create'])->name('user.create');
        Route::post('sign-in/create', [RegisterController::class, 'store'])->name('user.store');
        Route::post('sign-in/check', [RegisterController::class, 'check'])->name('user.check');
        
       });
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('sign-out', [SessionsController::class, 'destroy'])->name('logout');

        // Profile Pages
        Route::resource('MyProfile', ProfileController::class)->except(['create', 'store'])->names('MyProfile');
        Route::delete('MyProfile/delete/{MyProfile}', [ProfileController::class, 'destroy'])->name('MyProfile.destroy');
        Route::put('MyProfile/edit/{MyProfile}', [ProfileController::class, 'edit'])->name('MyProfile.edit');

        // Drivers Pages
        Route::resource('drivers', DriversController::class)->except(['create', 'store'])->names('drivers');
        Route::delete('drivers/delete/{driver}', [DriversController::class, 'destroy'])->name('drivers.destroy');
        Route::get('drivers/edit/{driver}', [DriversController::class, 'edit'])->name('drivers.edit');

        // Users Pages
        Route::resource('users', UsersController::class)->except(['create', 'store', 'show'])->names('users');
        Route::delete('users/delete/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::get('users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');

        // Orders Pages
        Route::resource('orders', OrdersController::class)->except(['create', 'store'])->names('orders');
        Route::delete('orders/delete/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');

        // Reviews Pages
        Route::resource('reviews', RatingsController::class)->except(['create', 'store'])->names('reviews');
        Route::delete('reviews/delete/{review}', [RatingsController::class, 'destroy'])->name('reviews.destroy');
    });

    // Additional prefixes for other user types can be added here later (e.g., 'users/', 'drivers/')
});
