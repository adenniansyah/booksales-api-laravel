<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

// Route untuk halaman Genre
Route::get('/genre', [GenreController::class, 'index']);

// Route untuk halaman Author
Route::get('/author', [AuthorController::class, 'index']);