<?php

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


Route::post('test', function () {
    return request()->all();
});
