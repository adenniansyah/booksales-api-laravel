<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre; // Pastikan import Model-nya ada

class GenreController extends Controller
{
    public function index()
    {
        // Panggil method static getAllData() dari Model Genre
        $genres = Genre::getAllData();

        // Kembalikan hasilnya sebagai JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar genre berhasil diambil',
            'data' => $genres
        ]);
    }
}