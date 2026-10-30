<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController; // Pindahkan ke atas bersama use lainnya

// Route untuk halaman Genre
Route::get('/genre', [GenreController::class, 'index']);

// Route untuk halaman Author
Route::get('/author', [AuthorController::class, 'index']);

// Route untuk halaman Books (Tugas Kita)
Route::get('/books', [BookController::class, 'index']);