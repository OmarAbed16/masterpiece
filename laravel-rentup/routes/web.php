<?php

use Illuminate\Support\Facades\Route;
//user pages
use App\Http\Controllers\Users\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [ListingController::class, 'landing'])->name('landing');
Route::get('/search', [ListingController::class, 'search'])->name('search');
Route::get('/about', [ListingController::class, 'about'])->name('about');



Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
