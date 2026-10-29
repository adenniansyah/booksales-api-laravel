<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    // Method Show (Read One)
    public function show($id): JsonResponse
    {
        $genre = Genre::find($id);

        // Validasi jika data tidak ditemukan
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data genre berhasil diambil.',
            'data' => $genre
        ], 200);
    }

    // Method Update
    public function update(Request $request, $id): JsonResponse
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $id
        ]);

        $genre->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil diperbarui.',
            'data' => $genre
        ], 200);
    }

    // Method Destroy
    public function destroy($id): JsonResponse
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil dihapus.'
        ], 200);
    }
    
    // Tambahkan juga method index() dan store() jika diperlukan untuk melengkapi CRUD
    public function index() { /* ... */ }
    public function store(Request $request) { /* ... */ }
}