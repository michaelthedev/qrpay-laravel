<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Init
Route::get('/ping', function () {
    return response()->json([
        'status' => 'success',
        'message' => "You see this message on your screen, get ready cause i'm going hard. Bing-Bong 😂",
    ]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
