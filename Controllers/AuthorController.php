<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author; 

class AuthorController extends Controller
{
    public function index()
    {
        // 1. Panggil data dari Model
        $authors = Author::getAllData();

        return response()->json([
            'success' => true,
            'message' => 'Daftar penulis berhasil diambil',
            'data' => $authors
        ]);
    }
}