<?php

use App\Http\Controllers\DataCollectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/data-collect/store', [DataCollectController::class, 'DataCollectStore']);
