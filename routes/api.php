<?php

use App\Http\Controllers\Api\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'AI Car Finder API',
        'status' => 'running'
    ]);
})->middleware('auth:sanctum');

Route::get('/cars', [CarController::class, 'index']);
Route::post('/ai-search', [CarController::class, 'aiSearch']);
