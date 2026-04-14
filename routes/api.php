<?php

use App\Http\Controllers\Api\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cars', [CarController::class, 'index']);
Route::post('/ai-search', [CarController::class, 'aiSearch']);
