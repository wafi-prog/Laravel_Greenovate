<?php

use App\Http\Controllers\Api\ArtikelContraller;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//categories
Route::apiResource('/api-categories', CategoriesController::class)->middleware('auth:sanctum');
// artikel
Route::apiResource('/api-artikels', ArtikelController::class)->middleware('auth:sanctum');
