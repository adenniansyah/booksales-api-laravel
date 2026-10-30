<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController; // <--- TAMBAHKAN IMPORT INI
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes - AUTHENTICATION
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| API Routes - PUBLIC ACCESS
| Read All & Show: Dapat diakses semua orang (tanpa middleware)
|--------------------------------------------------------------------------
*/
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);

/*
|--------------------------------------------------------------------------
| API Routes - PROTECTED (ADMIN ONLY)
| Create, Update, Destroy: Hanya admin (middleware auth:api + role:admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    
    // Author CRUD
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

    // Genre CRUD
    Route::post('/genres', [GenreController::class, 'store']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
});