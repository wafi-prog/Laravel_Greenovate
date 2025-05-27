<?php

use App\Http\Controllers\Api\ArtikelContraller;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\craftController;
use App\Http\Controllers\Api\filtersController;
use App\Http\Controllers\Api\KomunitasController;
use App\Http\Controllers\Api\ProduksController;
use App\Http\Controllers\Api\TokoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'register']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::put('/update_profile', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');

//categories
Route::apiResource('/api-categories', CategoriesController::class)->middleware('auth:sanctum');
// artikel
Route::apiResource('/api-artikels', ArtikelController::class)->middleware('auth:sanctum');

//categories
Route::apiResource('/api-filters', filtersController::class)->middleware('auth:sanctum');
// artikel
Route::apiResource('/api-crafts', craftController::class)->middleware('auth:sanctum');

// produk
Route::apiResource('/api-products', ProduksController::class)->middleware('auth:sanctum');

// komunitas
Route::apiResource('/api-tokos', TokoController::class)->middleware('auth:sanctum');
Route::apiResource('/api-chats', KomunitasController::class)->middleware('auth:sanctum');
Route::get('komunitas/{kategoriId}/chats',[KomunitasController::class,'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('posts/{artikelId}/comments', [CommentController::class, 'index']);
    Route::post('comments', [CommentController::class, 'store']);
    Route::put('comments/{commentId}', [CommentController::class, 'update']);
   Route::delete('/posts/{artikelId}/comments/{commentId}', [CommentController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('posts/{craftId}/comments', [CommentsController::class, 'index']);
    Route::post('comments', [CommentsController::class, 'store']);
    Route::put('comments/{komenId}', [CommentsController::class, 'update']);
   Route::delete('/posts/{craftId}/comments/{komenId}', [CommentsController::class, 'destroy']);
});
