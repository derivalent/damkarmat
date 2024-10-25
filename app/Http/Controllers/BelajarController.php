<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $belajars = Belajar::all();
        return view('admin.belajar.index', compact('belajars'));
    }

    public function create()
    {
        return view('admin.belajar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'audience' => 'required|string|max:255',
            'hari' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'status' => 'required|in:terjadwal,selesai',
        ]);

        Belajar::create($request->all());
        return redirect()->route('belajar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Menemukan entri Belajar berdasarkan ID
        $belajar = Belajar::findOrFail($id);
        // Mengembalikan view edit dengan data Belajar
        return view('admin.belajar.edit', compact('belajar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari pengguna
        $request->validate([
            'audience' => 'required|string|max:255',
            'hari' => 'required|date',
            'jam' => 'required|date_format:H:i:s',
            'status' => 'required|in:terjadwal,selesai',
        ]);
        // dd($request->all());
        // Menemukan entri Belajar berdasarkan ID
        $belajar = Belajar::findOrFail($id);

        // Memperbarui data dengan data yang diterima
        $belajar->audience = $request->audience;
        $belajar->hari = $request->hari;
        $belajar->jam = $request->jam;
        $belajar->status = $request->status;

        // Menyimpan perubahan ke database
        $belajar->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('belajar.index')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {
        $belajar = Belajar::findOrFail($id);
        $belajar->delete();
        return redirect()->route('belajar.index')->with('success', 'Data berhasil dihapus');
    }
}
