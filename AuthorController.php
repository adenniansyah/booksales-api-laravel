<?php

namespace App\Http\Controllers\Api; // <--- Sesuaikan namespace dengan folder Api

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * READ ALL DATA (GET /authors) - PUBLIK
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'status' => 'success',
            'data' => $authors
        ], 200);
    }

    /**
     * SHOW DETAIL DATA (GET /authors/{id}) - PUBLIK
     */
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data author tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $author
        ], 200);
    }

    /**
     * CREATE DATA (POST /authors) - ADMIN ONLY
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string', // Tambahkan validasi bio jika ada
        ]);

        $author = Author::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data author berhasil dibuat',
            'data' => $author
        ], 201);
    }

    /**
     * UPDATE DATA (PUT /authors/{id}) - ADMIN ONLY
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data author tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $author->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data author berhasil diperbarui',
            'data' => $author
        ], 200);
    }

    /**
     * DELETE DATA (DELETE /authors/{id}) - ADMIN ONLY
     */
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data author tidak ditemukan'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data author berhasil dihapus'
        ], 200);
    }
}