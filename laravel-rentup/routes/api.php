<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\Users\LandingPageController;
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


Route::get('recentListings', [DataController::class, 'getData']);
//landing page apis
Route::get('/oursTeam', [LandingPageController::class, 'getUsers']);
Route::get('/ourTeam', [LandingPageController::class, 'getRecentListings']);
Route::get('/recentReviews', [LandingPageController::class, 'getRecentReviews']);
