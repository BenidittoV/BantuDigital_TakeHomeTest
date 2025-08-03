<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $query = Artikel::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
        }

        $artikel = $query->paginate(10);
        return response()->json($artikel);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        $artikel = Artikel::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'penulis' => Auth::user()->nama,
            'kategori_id' => $validated['kategori_id'] ?? null,
        ]);

        return response()->json($artikel, 201);
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return response()->json($artikel);
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        $artikel->update($validated);
        return response()->json($artikel);
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return response()->json(null, 204);
    }
}
