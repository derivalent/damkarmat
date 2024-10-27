<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        return view('admin.dokumentasi.index', compact('dokumentasi'));
    }

    public function index_public()
{
    $dokumentasi = Dokumentasi::latest()->get();
    return view('public.dokumentasi_public', compact('dokumentasi'));
}

    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('gambar')->store('dokumentasi', 'public');

        Dokumentasi::create([
            'kegiatan' => $request->kegiatan,
            'gambar' => $path,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $dokumentasi = Dokumentasi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($dokumentasi->gambar);
            $path = $request->file('gambar')->store('dokumentasi', 'public');
            $dokumentasi->gambar = $path;
        }

        $dokumentasi->kegiatan = $request->kegiatan;
        $dokumentasi->save();

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        Storage::disk('public')->delete($dokumentasi->gambar);
        $dokumentasi->delete();

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus');
    }
}
