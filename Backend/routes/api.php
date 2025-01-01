<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Controllers
use App\Http\Controllers\Api\Users\{
    LandingPageController,
    AuthController,
    SearchController,
    SubscribeController,
    PropertyController,
    ProfileController,
    ChatGptController,
    MessagesController
};

// Dashboard Controllers
use App\Http\Controllers\Api\Dashboard\BookingManagementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//landing page ok
Route::get('/recentListings', [LandingPageController::class, 'getRecentListings']);
Route::get('/ourTeam', [LandingPageController::class, 'getUsers']);
Route::get('/recentReviews', [LandingPageController::class, 'getRecentReviews']);


//auth ok
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//search ok
Route::get('/search/renderSearch', [SearchController::class, 'renderSearch']);
Route::post('/search/setFavourite', [SearchController::class, 'setFavourite']);


// Subscribe ok
Route::post('/subscribe/add', [SubscribeController::class, 'add']);


//Property ok
Route::get('/property/{id}', [PropertyController::class, 'getProperty']);
Route::post('/booking', [PropertyController::class, 'createBooking']);


//Profile ok
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::get('profile/favorites', [ProfileController::class, 'getUserFavouriteList']);
Route::get('/profile/bookings', [ProfileController::class, 'getUserBookings']);
Route::post('profile/addReview', [ProfileController::class, 'addReview']);
Route::get('/profile/delete_booking/{id}', [ProfileController::class, 'destroy']);
Route::get('/profile/reviews', [ProfileController::class, 'getUserReviews']);
Route::patch('/profile/changepassword', [ProfileController::class, 'changePassword']);


//Messages ok
Route::get('messages/users/{id}', [MessagesController::class, 'getUserList']);
Route::get('messages/{user1Id}/{user2Id}', [MessagesController::class, 'getMessages']);
Route::post('messages/add', [MessagesController::class, 'addMessage']);



//chatgpt
Route::get('/chat', [ChatGptController::class, 'index']);



//Dashboard

//Get Last Orders notifications
Route::get('lastOrders', [BookingManagementController::class, 'index']);
