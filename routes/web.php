<?php

use Illuminate\Support\Facades\Route;
# default statement above, new added below

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});
#default route above, new below

Route::get('/about', function () {
    return view('about');
});
Route::get('/about', [PageController::class, 'about']);

// Authentication routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
// Protect routes with custom middleware
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });
    // Add more protected routes here
});