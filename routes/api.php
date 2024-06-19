<?php

use App\Http\Controllers\Api\Dashboard\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);


/**
 * plants
 */
Route::post('plants/{plant}', [App\Http\Controllers\Api\PlantController::class, 'update']);
Route::apiResource('plants', App\Http\Controllers\Api\PlantController::class)->except('update');

Route::prefix('dashboard')->group(function () {
    Route::resource('users', App\Http\Controllers\Api\Dashboard\UserController::class);
    Route::resource('users.plants', App\Http\Controllers\Api\Dashboard\User\PlantController::class)
        ->only(['index']);
});
