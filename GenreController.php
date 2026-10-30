<?php

namespace App\Http\Controllers\Api; // Pastikan namespace Api

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * READ ALL (GET /genres) - PUBLIK
     */
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            'status' => 'success',
            'data' => $genres
        ], 200);
    }

    /**
     * SHOW DETAIL (GET /genres/{id}) - PUBLIK
     */
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data genre tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $genre
        ], 200);
    }

    /**
     * CREATE (POST /genres) - ADMIN ONLY
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data genre berhasil dibuat',
            'data' => $genre
        ], 201);
    }

    /**
     * UPDATE (PUT /genres/{id}) - ADMIN ONLY
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data genre tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $genre->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data genre berhasil diperbarui',
            'data' => $genre
        ], 200);
    }

    /**
     * DELETE (DELETE /genres/{id}) - ADMIN ONLY
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data genre tidak ditemukan'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data genre berhasil dihapus'
        ], 200);
    }
}