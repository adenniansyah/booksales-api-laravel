<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
     * Display the specified resource.
     * Menampilkan satu data Author berdasarkan ID
     */
    public function show($id): JsonResponse
    {
        // Menggunakan Eloquent ORM find() untuk mencari data berdasarkan primary key
        $author = Author::find($id);

        
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data author berhasil diambil.',
            'data' => $author
        ], 200);
    }

    /**
     * Memperbarui data Author yang sudah ada
     */
    public function update(Request $request, $id): JsonResponse
    {
        $author = Author::find($id);

        // Validasi jika data tidak ditemukan sebelum update
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }

        
        // unique:authors,email,'.$id digunakan agar email sendiri tidak dianggap duplikat saat update
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $id
        ]);

        // Menggunakan Eloquent ORM update()
        $author->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil diperbarui.',
            'data' => $author
        ], 200);
    }

  
    public function destroy($id): JsonResponse
    {
        $author = Author::find($id);

        // Validasi jika data tidak ditemukan sebelum delete
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }

        // Menggunakan Eloquent ORM delete()
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil dihapus.'
        ], 200);
    }

   
}