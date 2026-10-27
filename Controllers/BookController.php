<?php

namespace App\Http\Controllers; // <--- INI HARUS APP\Http\Controllers\

use Illuminate\Http\Request;
use App\Models\Book; // Import Model Book

class BookController extends Controller // <--- NAMANYA BOOKCONTROLLER
{
    public function index()
    {
        // Panggil method getAllData() dari Model
        $books = Book::getAllData();

        // Kembalikan sebagai JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar buku berhasil diambil',
            'data' => $books
        ]);
    }
}