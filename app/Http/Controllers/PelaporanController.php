<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Personil;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

// class PelaporanController extends Controller
// {
//     public function index(Request $request)
//     {
//         $tahun = Tahun::all();

//         $month = $request->get('month');
//         $year = $request->get('year');
//         $jenisKejadian = $request->get('jenis_kejadian');

//         $query = Pelaporan::query();

//         if ($month) {
//             $query->whereMonth('hari_kejadian', $month);
//         }

//         if ($year) {
//             $query->whereYear('hari_kejadian', $year);
//         }

//         if ($jenisKejadian) {
//             $query->where('jenis_kejadian', $jenisKejadian);
//         }

//         $laporans = $query->get()->map(function ($laporan) {
//             $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
//             $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
//             $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
//             $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
//             return $laporan;
//         });

//         return view('admin.pelaporan.index', compact('laporans', 'tahun', 'month', 'year', 'jenisKejadian'));
//     }



//     public function button_perkejadian()
//     {
//         $laporans = Pelaporan::all()->map(function ($laporan) {
//             $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
//             $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
//             $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
//             $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
//             return $laporan;
//         });

//         return view('admin.pelaporan.button_perkejadian', compact('laporans'));
//     }

//     public function kebakaran(Request $request)
//     {
//         $tahun = Tahun::all();

//         $month = $request->get('month');
//         $year = $request->get('year');

//         $query = Pelaporan::where('jenis_kejadian', 'kebakaran');

//         if ($month) {
//             $query->whereMonth('hari_kejadian', $month);
//         }

//         if ($year) {
//             $query->whereYear('hari_kejadian', $year);
//         }

//         $laporans = $query->get()->map(function ($laporan) {
//             $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
//             $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
//             $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
//             $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
//             return $laporan;
//         });

//         return view('admin.pelaporan.index_kebakaran', compact('laporans', 'tahun', 'month', 'year'));
//     }

//     public function penyelamatan(Request $request)
//     {
//         $tahun = Tahun::all();

//         $month = $request->get('month');
//         $year = $request->get('year');

//         $query = Pelaporan::where('jenis_kejadian', 'penyelamatan');

//         if ($month) {
//             $query->whereMonth('hari_kejadian', $month);
//         }

//         if ($year) {
//             $query->whereYear('hari_kejadian', $year);
//         }

//         $laporans = $query->get()->map(function ($laporan) {
//             $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
//             $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
//             $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
//             $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
//             return $laporan;
//         });

//         return view('admin.pelaporan.index_penyelamatan', compact('laporans', 'tahun', 'month', 'year'));
//     }

//     public function create()
//     {
//         $personnels = Personil::all();
//         return view('admin.pelaporan.create', compact('personnels'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'kejadian' => 'required|string|max:255',
//             'jenis_kejadian' => 'required|in:kebakaran,penyelamatan',
//             'hari_kejadian' => 'required|date',
//             'laporan_masuk' => 'required|date_format:H:i', /
//             'berangkat' => 'required|date_format:H:i',
//             'tiba' => 'required|date_format:H:i',
//             'selesai' => 'required|date_format:H:i',
//             'lokasi' => 'nullable|string|max:255',
//             'pelapor' => 'nullable|string|max:255',
//             'data_diri' => 'nullable|string|max:255',
//             'pemilik' => 'nullable|string|max:255',
//             'penyebab' => 'nullable|string',
//             'kerugian' => 'nullable|string',
//             'korban' => 'nullable|string',
//             'kendala' => 'nullable|string',
//             'mobil_dinas' => 'nullable|string|max:255',
//             'personil' => 'required|array',
//             'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

//         ]);

//         $laporan = Pelaporan::create([
//             'kejadian' => $request->kejadian,
//             'jenis_kejadian' => $request->jenis_kejadian,
//             'hari_kejadian' => $request->hari_kejadian,
//             'laporan_masuk' => $request->laporan_masuk,
//             'berangkat' => $request->berangkat,
//             'tiba' => $request->tiba,
//             'selesai' => $request->selesai,
//             'lokasi' => $request->lokasi,
//             'pelapor' => $request->pelapor,
//             'data_diri' => $request->data_diri,
//             'pemilik' => $request->pemilik,
//             'penyebab' => $request->penyebab,
//             'kerugian' => $request->kerugian,
//             'korban' => $request->korban,
//             'kendala' => $request->kendala,
//             'mobil_dinas' => $request->mobil_dinas,
//             'personil' => json_encode($request->personil),
//         ]);

//         if ($request->hasFile('dokumentasi')) {
//             $file = $request->file('dokumentasi');
//             $path = $file->store('uploads/dokumentasi', 'public');
//             $laporan->dokumentasi = $path;
//         }

//         $laporan->save();

//         return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil disimpan.');
//     }

//     public function edit($id)
//     {
//         $laporan = Pelaporan::findOrFail($id);
//         $personnels = Personil::all();
//         $selectedPersonil = json_decode($laporan->personil, true);

//         return view('admin.pelaporan.edit', compact('laporan', 'personnels', 'selectedPersonil'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'kejadian' => 'required|string|max:255',
//             'jenis_kejadian' => 'required|in:kebakaran,penyelamatan',
//             'hari_kejadian' => 'required|date',
//             'laporan_masuk' => 'required|date_format:H:i:s',
//             'berangkat' => 'required|date_format:H:i:s',
//             'tiba' => 'required|date_format:H:i:s',
//             'selesai' => 'required|date_format:H:i:s',
//             'lokasi' => 'nullable|string|max:255',
//             'pelapor' => 'nullable|string|max:255',
//             'data_diri' => 'nullable|string|max:255',
//             'pemilik' => 'nullable|string|max:255',
//             'penyebab' => 'nullable|string',
//             'kerugian' => 'nullable|string',
//             'korban' => 'nullable|string',
//             'kendala' => 'nullable|string',
//             'mobil_dinas' => 'nullable|string|max:255',
//             'personil' => 'required|array',
//         ]);

//         $laporan = Pelaporan::findOrFail($id);
//         $laporan->update([
//             'kejadian' => $request->kejadian,
//             'jenis_kejadian' => $request->jenis_kejadian,
//             'hari_kejadian' => $request->hari_kejadian,
//             'laporan_masuk' => $request->laporan_masuk,
//             'berangkat' => $request->berangkat,
//             'tiba' => $request->tiba,
//             'selesai' => $request->selesai,
//             'lokasi' => $request->lokasi,
//             'pelapor' => $request->pelapor,
//             'data_diri' => $request->data_diri,
//             'pemilik' => $request->pemilik,
//             'penyebab' => $request->penyebab,
//             'kerugian' => $request->kerugian,
//             'korban' => $request->korban,
//             'kendala' => $request->kendala,
//             'mobil_dinas' => $request->mobil_dinas,
//             'personil' => json_encode($request->personil),
//         ]);

//         return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $laporan = Pelaporan::findOrFail($id);
//         $laporan->delete();

//         return redirect()->route('Pelaporan.index')->with('success', 'Laporan berhasil dihapus.');
//     }

//     public function filterPrint()
//     {
//         $tahun = Tahun::all();
//         return view('admin.pelaporan.filterPrint', compact('tahun'));
//     }

//     public function print(Request $request)
//     {
//         $month = $request->get('month');
//         $year = $request->get('year');
//         $jenisKeadaan = $request->get('jenis_keadaan');

//         $query = Pelaporan::query();

//         if ($month) {
//             $query->whereMonth('created_at', $month);
//         }

//         if ($year) {
//             $query->whereYear('created_at', $year);
//         }

//         if ($jenisKeadaan) {
//             $query->where('jenis_kejadian', $jenisKeadaan);
//         }

//         $laporans = $query->get()->map(function ($laporan) {
//             $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
//             $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
//             $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
//             $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
//             return $laporan;
//         });

//         $pdf = PDF::loadView('admin.pelaporan.print', compact('laporans', 'month', 'year', 'jenisKeadaan'))
//             ->setPaper('a2', 'landscape');

//         return $pdf->download('laporan.pdf');
//     }
// }


class PelaporanController extends Controller
{
    public function index(Request $request)
    {
        $tahun = Tahun::all();

        $month = $request->get('month');
        $year = $request->get('year');
        $jenisKejadian = $request->get('jenis_kejadian');

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

        $laporans = $query->get()->map(function ($laporan) {
            $laporan->laporan_masuk = Carbon::parse($laporan->laporan_masuk)->format('H:i');
            $laporan->berangkat = Carbon::parse($laporan->berangkat)->format('H:i');
            $laporan->tiba = Carbon::parse($laporan->tiba)->format('H:i');
            $laporan->selesai = Carbon::parse($laporan->selesai)->format('H:i');
            return $laporan;
        });

        return view('admin.pelaporan.index', compact('laporans', 'tahun', 'month', 'year', 'jenisKejadian'));
    }

    // Show the form for creating a new pelaporan
    public function create()
    {
        return view('pelaporan.create');
    }

    // Store a newly created pelaporan in storage
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'objek_kejadian' => 'required|string|max:255',
            'jenis_kejadian' => 'required|in:kebakaran,non-kebakaran',
            'hari_kejadian' => 'required|date',
            'laporan_masuk' => 'required|date_format:H:i',
            'berangkat' => 'required|date_format:H:i',
            'tiba' => 'required|date_format:H:i',
            'penanganan' => 'required|date_format:H:i',
            'lokasi' => 'nullable|string|max:255',
            'pelapor' => 'nullable|string|max:255',
            'NIK' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:laki-laki,wanita',
            'pemilik' => 'nullable|string|max:255',
            'penyebab' => 'nullable|string',
            'kerugian' => 'nullable|string',
            'meninggal' => 'nullable|string',
            'luka_berat' => 'nullable|string',
            'luka_ringan' => 'nullable|string',
            'kendala' => 'nullable|string',
            'mobil_dinas' => 'nullable|string|max:255',
            'personil' => 'required|array',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Calculate response time
        $responTime = Carbon::parse($request->penanganan)->diffInMinutes(Carbon::parse($request->laporan_masuk));

        // Handle file upload for 'dokumentasi'
        $dokumentasiPath = null;
        if ($request->hasFile('dokumentasi')) {
            $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi');
        }

        // Save the report data
        Pelaporan::create([
            'objek_kejadian' => $request->objek_kejadian,
            'jenis_kejadian' => $request->jenis_kejadian,
            'hari_kejadian' => $request->hari_kejadian,
            'laporan_masuk' => $request->laporan_masuk,
            'berangkat' => $request->berangkat,
            'tiba' => $request->tiba,
            'penanganan' => $request->penanganan,
            'respon_time' => $responTime,
            'lokasi' => $request->lokasi,
            'pelapor' => $request->pelapor,
            'NIK' => $request->NIK,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pemilik' => $request->pemilik,
            'penyebab' => $request->penyebab,
            'kerugian' => $request->kerugian,
            'meninggal' => $request->meninggal,
            'luka_berat' => $request->luka_berat,
            'luka_ringan' => $request->luka_ringan,
            'kendala' => $request->kendala,
            'mobil_dinas' => $request->mobil_dinas,
            'personil' => json_encode($request->personil), // Encode array to JSON for storage
            'dokumentasi' => $dokumentasiPath,
        ]);

        return redirect()->route('pelaporan.index')->with('success', 'Data pelaporan berhasil disimpan.');
    }

    // Show the form for editing the specified pelaporan
    public function edit(Pelaporan $pelaporan)
    {
        return view('pelaporan.edit', compact('pelaporan'));
    }

    // Update the specified pelaporan in storage
    public function update(Request $request, Pelaporan $pelaporan)
    {
        // Validate input
        $request->validate([
            'objek_kejadian' => 'required|string|max:255',
            'jenis_kejadian' => 'required|in:kebakaran,non-kebakaran',
            'hari_kejadian' => 'required|date',
            'laporan_masuk' => 'required|date_format:H:i',
            'berangkat' => 'required|date_format:H:i',
            'tiba' => 'required|date_format:H:i',
            'penanganan' => 'required|date_format:H:i',
            'lokasi' => 'nullable|string|max:255',
            'pelapor' => 'nullable|string|max:255',
            'NIK' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:laki-laki,wanita',
            'pemilik' => 'nullable|string|max:255',
            'penyebab' => 'nullable|string',
            'kerugian' => 'nullable|string',
            'meninggal' => 'nullable|string',
            'luka_berat' => 'nullable|string',
            'luka_ringan' => 'nullable|string',
            'kendala' => 'nullable|string',
            'mobil_dinas' => 'nullable|string|max:255',
            'personil' => 'required|array',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Calculate response time
        $responTime = Carbon::parse($request->penanganan)->diffInMinutes(Carbon::parse($request->laporan_masuk));

        // Handle file upload for 'dokumentasi'
        if ($request->hasFile('dokumentasi')) {
            // Delete old dokumentasi if exists
            if ($pelaporan->dokumentasi) {
                Storage::delete($pelaporan->dokumentasi);
            }
            $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi');
            $pelaporan->dokumentasi = $dokumentasiPath;
        }

        // Update the pelaporan data
        $pelaporan->update([
            'objek_kejadian' => $request->objek_kejadian,
            'jenis_kejadian' => $request->jenis_kejadian,
            'hari_kejadian' => $request->hari_kejadian,
            'laporan_masuk' => $request->laporan_masuk,
            'berangkat' => $request->berangkat,
            'tiba' => $request->tiba,
            'penanganan' => $request->penanganan,
            'respon_time' => $responTime,
            'lokasi' => $request->lokasi,
            'pelapor' => $request->pelapor,
            'NIK' => $request->NIK,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pemilik' => $request->pemilik,
            'penyebab' => $request->penyebab,
            'kerugian' => $request->kerugian,
            'meninggal' => $request->meninggal,
            'luka_berat' => $request->luka_berat,
            'luka_ringan' => $request->luka_ringan,
            'kendala' => $request->kendala,
            'mobil_dinas' => $request->mobil_dinas,
            'personil' => json_encode($request->personil),
        ]);

        return redirect()->route('pelaporan.index')->with('success', 'Data pelaporan berhasil diperbarui.');
    }

    // Remove the specified pelaporan from storage
    public function destroy(Pelaporan $pelaporan)
    {
        // Delete dokumentasi file if it exists
        if ($pelaporan->dokumentasi) {
            Storage::delete($pelaporan->dokumentasi);
        }

        // Delete the record
        $pelaporan->delete();

        return redirect()->route('pelaporan.index')->with('success', 'Data pelaporan berhasil dihapus.');
    }
}
