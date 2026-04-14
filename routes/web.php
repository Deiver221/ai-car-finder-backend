<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'AI Car Finder API',
        'status' => 'running'
    ]);
});
