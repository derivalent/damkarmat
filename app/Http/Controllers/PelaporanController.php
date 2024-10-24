<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Personil;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PelaporanController extends Controller
{
    // Menampilkan daftar laporan
    // public function index()
    // {
    //     $laporans = Pelaporan::all(); // Ambil semua data pelaporan
    //     return view('admin.pelaporan.index', compact('laporans'));
    // }
    // Assuming you are fetching the laporan data in a method
public function index()
{
    $laporans = Pelaporan::all()->map(function ($laporan) {
        $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
        $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
        $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
        $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
        return $laporan;
    });

    return view('admin.pelaporan.index', compact('laporans'));
}


    // Menampilkan form untuk menambahkan laporan baru
    public function create()
    {
        $personnels = Personil::all(); // Retrieve all personnel data
        return view('admin.pelaporan.create', compact('personnels'));
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kejadian' => 'required|string|max:255',
            'jenis_kejadian' => 'required|in:kebakaran,penyelamatan',
            'hari_kejadian' => 'required|date',
            'laporan_masuk' => 'required|date_format:H:i', // Format waktu
            'berangkat' => 'required|date_format:H:i',
            'tiba' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
            'lokasi' => 'nullable|string|max:255',
            'pelapor' => 'nullable|string|max:255',
            'pemilik' => 'nullable|string|max:255',
            'penyebab' => 'nullable|string',
            'kerugian' => 'nullable|string',
            'korban' => 'nullable|string',
            'kendala' => 'nullable|string',
            'mobil_dinas' => 'nullable|string|max:255',
            'personil' => 'required|array', // Pastikan personil diisi
        ]);

        // Menyimpan data laporan
        Pelaporan::create([
            'kejadian' => $request->kejadian,
            'jenis_kejadian' => $request->jenis_kejadian,
            'hari_kejadian' => $request->hari_kejadian,
            'laporan_masuk' => $request->laporan_masuk,
            'berangkat' => $request->berangkat,
            'tiba' => $request->tiba,
            'selesai' => $request->selesai,
            'lokasi' => $request->lokasi,
            'pelapor' => $request->pelapor,
            'pemilik' => $request->pemilik,
            'penyebab' => $request->penyebab,
            'kerugian' => $request->kerugian,
            'korban' => $request->korban,
            'kendala' => $request->kendala,
            'mobil_dinas' => $request->mobil_dinas,
            'personil' => json_encode($request->personil), // Menyimpan sebagai JSON
        ]);

        return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit laporan
    // public function edit($id)
    // {
    //     $laporan = Pelaporan::findOrFail($id); // Ambil data laporan berdasarkan ID
    //     $personnels = Personil::all(); // Ambil data personil
    //     return view('admin.pelaporan.edit', compact('laporan', 'personnels'));
    // }

    public function edit($id)
    {
        $laporan = Pelaporan::findOrFail($id); // Retrieve the pelaporan data
        $personnels = Personil::all(); // Retrieve all personnel
        $selectedPersonil = json_decode($laporan->personil, true); // Decode the JSON to an array

        return view('admin.pelaporan.edit', compact('laporan', 'personnels', 'selectedPersonil'));
    }



    // Mengupdate laporan
    public function update(Request $request, $id)
    {
        // Validasi input
        // $request->validate([
        //     'kejadian' => 'required|string|max:255',
        //     'jenis_kejadian' => 'required|in:kebakaran,penyelamatan',
        //     'hari_kejadian' => 'required|date',
        //     'laporan_masuk' => 'required|date_format:H:i',
        //     'berangkat' => 'required|date_format:H:i',
        //     'tiba' => 'required|date_format:H:i',
        //     'selesai' => 'required|date_format:H:i',
        //     'lokasi' => 'nullable|string|max:255',
        //     'pelapor' => 'nullable|string|max:255',
        //     'pemilik' => 'nullable|string|max:255',
        //     'penyebab' => 'nullable|string',
        //     'kerugian' => 'nullable|string',
        //     'korban' => 'nullable|string',
        //     'kendala' => 'nullable|string',
        //     'mobil_dinas' => 'nullable|string|max:255',
        //     'personil' => 'required|array',
        // ]);
        $request->validate([
            'kejadian' => 'required|string|max:255',
            'jenis_kejadian' => 'required|in:kebakaran,penyelamatan',
            'hari_kejadian' => 'required|date',
            'laporan_masuk' => 'required|date_format:H:i:s', // Format waktu
            'berangkat' => 'required|date_format:H:i:s',
            'tiba' => 'required|date_format:H:i:s',
            'selesai' => 'required|date_format:H:i:s',
            'lokasi' => 'nullable|string|max:255',
            'pelapor' => 'nullable|string|max:255',
            'pemilik' => 'nullable|string|max:255',
            'penyebab' => 'nullable|string',
            'kerugian' => 'nullable|string',
            'korban' => 'nullable|string',
            'kendala' => 'nullable|string',
            'mobil_dinas' => 'nullable|string|max:255',
            'personil' => 'required|array', // Pastikan personil diisi
        ]);

        // Mengupdate data laporan
        $laporan = Pelaporan::findOrFail($id);
        $laporan->update([
            'kejadian' => $request->kejadian,
            'jenis_kejadian' => $request->jenis_kejadian,
            'hari_kejadian' => $request->hari_kejadian,
            'laporan_masuk' => $request->laporan_masuk,
            'berangkat' => $request->berangkat,
            'tiba' => $request->tiba,
            'selesai' => $request->selesai,
            'lokasi' => $request->lokasi,
            'pelapor' => $request->pelapor,
            'pemilik' => $request->pemilik,
            'penyebab' => $request->penyebab,
            'kerugian' => $request->kerugian,
            'korban' => $request->korban,
            'kendala' => $request->kendala,
            'mobil_dinas' => $request->mobil_dinas,
            'personil' => json_encode($request->personil), // Menyimpan sebagai JSON
        ]);

        return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan
    public function destroy($id)
    {
        $laporan = Pelaporan::findOrFail($id);
        $laporan->delete(); // Hapus data laporan

        return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
