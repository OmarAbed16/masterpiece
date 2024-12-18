<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\Users\LandingPageController;
use App\Http\Controllers\Api\Users\AuthController;
use App\Http\Controllers\Api\Users\SearchController;
use App\Http\Controllers\Api\Users\SubscribeController;
use App\Http\Controllers\Api\Users\PropertyController;
use App\Http\Controllers\Api\Users\ProfileController;
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


Route::get('get-data', [DataController::class, 'getData']);
//landing page apis
Route::get('/ourTeam', [LandingPageController::class, 'getUsers']);
Route::get('/recentListings', [LandingPageController::class, 'getRecentListings']);
Route::get('/recentReviews', [LandingPageController::class, 'getRecentReviews']);


//login and register apis
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('user', [AuthController::class, 'user']);



//search
Route::get('/search/renderSearch', [SearchController::class, 'renderSearch']);
Route::get('/search/setFavourite', [SearchController::class, 'setFavourite']);


// Subscribe
Route::get('/subscribe/add', [SubscribeController::class, 'add']);


//Property
Route::get('/property/{id}', [PropertyController::class, 'getProperty']);
Route::get('/booking', [PropertyController::class, 'createBooking']);


//Profile
Route::post('/profile/changepassword', [ProfileController::class, 'changePassword']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::get('/profile/getreviews', [ProfileController::class, 'getReviews']);