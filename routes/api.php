<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\TransferController;
use App\Http\Controllers\User\TransactionController;

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


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [UserController::class, 'get']);

    Route::get('/transactions', [TransactionController::class, 'get']);

    Route::prefix('/transfer')->group(function () {
        Route::get('/currencies', [TransferController::class, 'currencies']);
    });
});
