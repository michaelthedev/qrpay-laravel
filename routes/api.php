<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Init
Route::get('/ping', function () {
    return response()->json([
        'status' => 'running',
        'message' => "You see this message on your screen, get ready cause i'm going hard. Bing-Bong 😂",
    ]);
});

// auth route
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/user', function (Request $request) {
    return (new \App\DTO\ApiResponse(
        error: false,
        data: $request->user(),
        message: 'User retrieved successfully',
    ))->toArray();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {

});
