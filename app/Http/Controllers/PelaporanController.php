<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Personil;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class PelaporanController extends Controller
{
    // Menampilkan daftar laporan
    // public function index(Request $request)
    // {
    //     // Retrieve all years for the dropdown
    //     $tahun = Tahun::all();

    //     // Capture the selected month and year from the request
    //     $month = $request->get('month');
    //     $year = $request->get('year');

    //     // Filter Pelaporan based on month and year if they are provided
    //     $query = Pelaporan::query();

    //     if ($month) {
    //         $query->whereMonth('hari_kejadian', $month);
    //     }

    //     if ($year) {
    //         $query->whereYear('hari_kejadian', $year);
    //     }

    //     // Get the filtered data
    //     $laporans = $query->get()->map(function ($laporan) {
    //         $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
    //         $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
    //         $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
    //         $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
    //         return $laporan;
    //     });

    //     return view('admin.pelaporan.index', compact('laporans', 'tahun', 'month', 'year'));
    // }
    public function index(Request $request)
    {
        // Retrieve all years for the dropdown
        $tahun = Tahun::all();

        // Capture the selected month, year, and jenis_kejadian from the request
        $month = $request->get('month');
        $year = $request->get('year');
        $jenisKejadian = $request->get('jenis_kejadian');

        // Filter Pelaporan based on month, year, and jenis_kejadian if they are provided
        $query = Pelaporan::query();

        if ($month) {
            $query->whereMonth('hari_kejadian', $month);
        }

        if ($year) {
            $query->whereYear('hari_kejadian', $year);
        }

        if ($jenisKejadian) {
            $query->where('jenis_kejadian', $jenisKejadian);
        }

        // Get the filtered data
        $laporans = $query->get()->map(function ($laporan) {
            $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
            $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
            $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
            $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
            return $laporan;
        });

        return view('admin.pelaporan.index', compact('laporans', 'tahun', 'month', 'year', 'jenisKejadian'));
    }



    public function button_perkejadian()
    {
        $laporans = Pelaporan::all()->map(function ($laporan) {
            $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
            $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
            $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
            $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
            return $laporan;
        });

        return view('admin.pelaporan.button_perkejadian', compact('laporans'));
    }

    // public function kebakaran()
    // {

    //     // Filter data berdasarkan jenis_kejadian 'kebakaran'
    //     $laporans = Pelaporan::where('jenis_kejadian', 'kebakaran')->get()->map(function ($laporan) {
    //         $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
    //         $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
    //         $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
    //         $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
    //         return $laporan;
    //     });

    //     return view('admin.pelaporan.index_kebakaran', compact('laporans'));
    // }

    public function kebakaran(Request $request)
    {
        // Retrieve all years for the dropdown
        $tahun = Tahun::all();

        // Capture the selected month and year from the request
        $month = $request->get('month');
        $year = $request->get('year');

        // Start the query to filter by jenis_kejadian 'kebakaran'
        $query = Pelaporan::where('jenis_kejadian', 'kebakaran');

        // Filter Pelaporan based on month and year if they are provided
        if ($month) {
            $query->whereMonth('hari_kejadian', $month);
        }

        if ($year) {
            $query->whereYear('hari_kejadian', $year);
        }

        // Get the filtered data
        $laporans = $query->get()->map(function ($laporan) {
            $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
            $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
            $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
            $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
            return $laporan;
        });

        return view('admin.pelaporan.index_kebakaran', compact('laporans', 'tahun', 'month', 'year'));
    }



    // public function penyelamatan()
    // {
    //     // Filter data berdasarkan jenis_kejadian 'kebakaran'
    //     $laporans = Pelaporan::where('jenis_kejadian', 'penyelamatan')->get()->map(function ($laporan) {
    //         $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
    //         $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
    //         $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
    //         $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
    //         return $laporan;
    //     });

    //     return view('admin.pelaporan.index_penyelamatan', compact('laporans'));
    // }

    public function penyelamatan(Request $request)
    {
        // Retrieve all years for the dropdown
        $tahun = Tahun::all();

        // Capture the selected month and year from the request
        $month = $request->get('month');
        $year = $request->get('year');

        // Start the query to filter by jenis_kejadian 'kebakaran'
        $query = Pelaporan::where('jenis_kejadian', 'penyelamatan');

        // Filter Pelaporan based on month and year if they are provided
        if ($month) {
            $query->whereMonth('hari_kejadian', $month);
        }

        if ($year) {
            $query->whereYear('hari_kejadian', $year);
        }

        // Get the filtered data
        $laporans = $query->get()->map(function ($laporan) {
            $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
            $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
            $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
            $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
            return $laporan;
        });

        return view('admin.pelaporan.index_penyelamatan', compact('laporans', 'tahun', 'month', 'year'));
    }


    // Menampilkan form untuk menambahkan laporan baru
    public function create()
    {
        $personnels = Personil::all(); // Retrieve all personnel data
        return view('admin.pelaporan.create', compact('personnels'));
    }

    // Menyimpan laporan baru
    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'kejadian' => 'required|string|max:255',
    //         'jenis_kejadian' => 'required|in:kebakaran,penyelamatan',
    //         'hari_kejadian' => 'required|date',
    //         'laporan_masuk' => 'required|date_format:H:i', // Format waktu
    //         'berangkat' => 'required|date_format:H:i',
    //         'tiba' => 'required|date_format:H:i',
    //         'selesai' => 'required|date_format:H:i',
    //         'lokasi' => 'nullable|string|max:255',
    //         'pelapor' => 'nullable|string|max:255',
    //         'pemilik' => 'nullable|string|max:255',
    //         'penyebab' => 'nullable|string',
    //         'kerugian' => 'nullable|string',
    //         'korban' => 'nullable|string',
    //         'kendala' => 'nullable|string',
    //         'mobil_dinas' => 'nullable|string|max:255',
    //         'personil' => 'required|array', // Pastikan personil diisi
    //     ]);

    //     // Menyimpan data laporan
    //     Pelaporan::create([
    //         'kejadian' => $request->kejadian,
    //         'jenis_kejadian' => $request->jenis_kejadian,
    //         'hari_kejadian' => $request->hari_kejadian,
    //         'laporan_masuk' => $request->laporan_masuk,
    //         'berangkat' => $request->berangkat,
    //         'tiba' => $request->tiba,
    //         'selesai' => $request->selesai,
    //         'lokasi' => $request->lokasi,
    //         'pelapor' => $request->pelapor,
    //         'pemilik' => $request->pemilik,
    //         'penyebab' => $request->penyebab,
    //         'kerugian' => $request->kerugian,
    //         'korban' => $request->korban,
    //         'kendala' => $request->kendala,
    //         'mobil_dinas' => $request->mobil_dinas,
    //         'personil' => json_encode($request->personil), // Menyimpan sebagai JSON
    //     ]);

    //     return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    // }

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
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar dokumentasi
            'data_diri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar data diri
        ]);

        // Menyimpan data laporan
        $laporan = Pelaporan::create([
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
            'personil' => json_encode($request->personil), // Encode to JSON for storage
        ]);

        // Menyimpan gambar dokumentasi
        if ($request->hasFile('dokumentasi')) {
            $file = $request->file('dokumentasi');
            $path = $file->store('uploads/dokumentasi', 'public'); // Store in public/uploads/dokumentasi
            $laporan->dokumentasi = $path;
        }

        // Menyimpan gambar data diri
        if ($request->hasFile('data_diri')) {
            $file = $request->file('data_diri');
            $path = $file->store('uploads/data_diri', 'public'); // Store in public/uploads/data_diri
            $laporan->data_diri = $path;
        }

        $laporan->save(); // Save changes to the database

        return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil disimpan.');
    }

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

    // // Metode untuk melakukan print pelaporan
    // public function print(Request $request)
    // {
    //     // Capture the selected month and year from the request
    //     $month = $request->get('month');
    //     $year = $request->get('year');

    //     // Filter Pelaporan based on month and year if they are provided
    //     $query = Pelaporan::query();

    //     if ($month) {
    //         $query->whereMonth('created_at', $month);
    //     }

    //     if ($year) {
    //         $query->whereYear('created_at', $year);
    //     }

    //     // Get the filtered data
    //     $laporans = $query->get()->map(function ($laporan) {
    //         $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
    //         $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
    //         $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
    //         $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
    //         return $laporan;
    //     });

    //     // Generate PDF
    //     $pdf = PDF::loadView('admin.pelaporan.print', compact('laporans', 'month', 'year'));
    //     return $pdf->download('laporan.pdf');
    // }

    // Metode untuk menampilkan form filter sebelum mencetak
    public function filterPrint()
    {
        $tahun = Tahun::all(); // Ambil data tahun untuk dropdown
        return view('admin.pelaporan.filterPrint', compact('tahun'));
    }

    // Metode untuk melakukan print pelaporan tapi gak bisa landscape
    // public function print(Request $request)
    // {
    //     // Capture the selected month, year, and jenis kejadian from the request
    //     $month = $request->get('month');
    //     $year = $request->get('year');
    //     $jenisKeadaan = $request->get('jenis_keadaan');

    //     // Filter Pelaporan based on month, year, and jenis kejadian if they are provided
    //     $query = Pelaporan::query();

    //     if ($month) {
    //         $query->whereMonth('created_at', $month);
    //     }

    //     if ($year) {
    //         $query->whereYear('created_at', $year);
    //     }

    //     if ($jenisKeadaan) {
    //         $query->where('jenis_kejadian', $jenisKeadaan); // Sesuaikan dengan kolom di database Anda
    //     }

    //     // Get the filtered data
    //     $laporans = $query->get()->map(function ($laporan) {
    //         $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
    //         $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
    //         $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
    //         $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
    //         return $laporan;
    //     });

    //     // Generate PDF
    //     $pdf = PDF::loadView('admin.pelaporan.print', compact('laporans', 'month', 'year', 'jenisKeadaan'));
    //     return $pdf->download('laporan.pdf');
    // }

    public function print(Request $request)
    {
        // Capture the selected month, year, and jenis kejadian from the request
        $month = $request->get('month');
        $year = $request->get('year');
        $jenisKeadaan = $request->get('jenis_keadaan');

        // Filter Pelaporan based on month, year, and jenis kejadian if they are provided
        $query = Pelaporan::query();

        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        if ($year) {
            $query->whereYear('created_at', $year);
        }

        if ($jenisKeadaan) {
            $query->where('jenis_kejadian', $jenisKeadaan);
        }

        // Get the filtered data and format time fields
        $laporans = $query->get()->map(function ($laporan) {
            $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
            $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
            $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
            $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
            return $laporan;
        });

        // Generate PDF with landscape orientation
        $pdf = PDF::loadView('admin.pelaporan.print', compact('laporans', 'month', 'year', 'jenisKeadaan'))
            ->setPaper('a2', 'landscape'); // Set to landscape orientation

        return $pdf->download('laporan.pdf');
    }
}
