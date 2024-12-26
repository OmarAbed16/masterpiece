<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ProfileController,
    RegisterController,
    SessionsController,
    AdminsController,
    UsersController,
    OrdersController,
    RatingsController,
    PropertyController,
    SubscribeController
};





// Guest Routes
Route::middleware('guest')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::redirect('/', 'sign-in');
        Route::get('sign-in', [SessionsController::class, 'create'])->name('admin.login');
        Route::post('sign-in', [SessionsController::class, 'store']);
        
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

        // Admins Pages
        Route::resource('admins-profile', AdminsController::class)->except(['create', 'store'])->names('admins');
        Route::delete('admins-profile/delete/{admin}', [AdminsController::class, 'destroy'])->name('admins.destroy');
        Route::get('admins-profile/edit/{admin}', [AdminsController::class, 'edit'])->name('admins.edit');

        // Users Pages
        Route::resource('users', UsersController::class)->except(['create', 'store', 'show'])->names('users');
        Route::delete('users/delete/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::get('users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');

        // Orders Pages
        Route::resource('orders', OrdersController::class)->except(['create', 'store'])->names('orders');
        Route::delete('orders/delete/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
        Route::get('orders/edit/{order}', [OrdersController::class, 'edit'])->name('orders.edit');

        // Reviews Pages
        Route::resource('reviews', RatingsController::class)->except(['create', 'store'])->names('reviews');
        Route::delete('reviews/delete/{review}', [RatingsController::class, 'destroy'])->name('reviews.destroy');

        // Messages Pages
        Route::resource('messages', SubscribeController::class)->except(['create', 'store'])->names('messages');
        Route::delete('messages/delete/{message}', [SubscribeController::class, 'destroy'])->name('messages.destroy');

        // Properties Pages
        Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
        Route::get('properties/create', [PropertyController::class, 'create'])->name('properties.create');
        Route::post('properties/store/{id}', [PropertyController::class, 'store'])->name('properties.store');
        Route::get('properties/edit/{property}', [PropertyController::class, 'edit'])->name('properties.edit');
        Route::put('properties/update/{property}', [PropertyController::class, 'update'])->name('properties.update');
        Route::delete('properties/delete/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');





    });

    // Additional prefixes for other user types can be added here later (e.g., 'users/', 'drivers/')
});
