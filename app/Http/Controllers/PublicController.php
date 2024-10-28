<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pelaporan; // Don't forget to import the Pelaporan model
use Carbon\Carbon;
use App\Models\Tahun;

class PublicController extends Controller
{

// public function dashboard_public()
// {
//     $berita = Berita::all(); // Fetch all berita records
//     return view('public.dashboard', ['berita' => $berita]); // Pass berita directly
// }

// public function dashboard_public()
// {
//     // $berita = Berita::all(); // Fetch all berita records
//     // return view('public.dashboard', compact('berita')); // Pass berita directly
//     // Get berita data sorted by 'created_at' in descending order
//     $berita = Berita::orderBy('created_at', 'desc')->get();
//     return view('public.dashboard', compact('berita'));

// }

// public function dashboard_public()
// {
//     // Get berita data sorted by 'created_at' in descending order
//     $berita = Berita::orderBy('created_at', 'desc')->get();

//     // Get the current year
//     $currentYear = Carbon::now()->year;

//     // Query for kebakaran and penyelamatan counts grouped by month
//     $data = Pelaporan::selectRaw('MONTH(hari_kejadian) as month,
//                                    SUM(CASE WHEN jenis_kejadian = "kebakaran" THEN 1 ELSE 0 END) as kebakaran_count,
//                                    SUM(CASE WHEN jenis_kejadian = "penyelamatan" THEN 1 ELSE 0 END) as penyelamatan_count')
//         ->whereYear('hari_kejadian', $currentYear)
//         ->groupBy('month')
//         ->orderBy('month')
//         ->get();

//     // Prepare data for the chart
//     $labels = [];
//     $kebakaranData = [];
//     $penyelamatanData = [];

//     // Fill the data arrays
//     foreach ($data as $monthData) {
//         $labels[] = Carbon::create()->month($monthData->month)->format('F'); // Month names
//         $kebakaranData[] = $monthData->kebakaran_count;
//         $penyelamatanData[] = $monthData->penyelamatan_count;
//     }

//     return view('public.dashboard', compact('berita', 'labels', 'kebakaranData', 'penyelamatanData'));
// }

    public function dashboard_public(Request $request)
    {
        // Get berita data sorted by 'created_at' in descending order
        $berita = Berita::orderBy('created_at', 'desc')->get();

        // Get the current year or the year passed from the request
        $year = $request->input('year', Carbon::now()->year); // Default to current year

        // Query for kebakaran and penyelamatan counts grouped by month
        $data = Pelaporan::selectRaw('MONTH(hari_kejadian) as month,
                                       SUM(CASE WHEN jenis_kejadian = "kebakaran" THEN 1 ELSE 0 END) as kebakaran_count,
                                       SUM(CASE WHEN jenis_kejadian = "penyelamatan" THEN 1 ELSE 0 END) as penyelamatan_count')
            ->whereYear('hari_kejadian', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare data for the chart
        $labels = [];
        $kebakaranData = [];
        $penyelamatanData = [];

        // Fill the data arrays
        foreach ($data as $monthData) {
            $labels[] = Carbon::create()->month($monthData->month)->format('F'); // Month names
            $kebakaranData[] = $monthData->kebakaran_count;
            $penyelamatanData[] = $monthData->penyelamatan_count;
        }

        // Get all available years from the 'tahun' table
        $years = Tahun::pluck('data_tahun')->toArray();

        // Prepare yearly data
    $yearlyData = [];
    foreach ($years as $yearItem) {
        $yearlyCounts = Pelaporan::whereYear('hari_kejadian', $yearItem)
            ->selectRaw('SUM(CASE WHEN jenis_kejadian = "kebakaran" THEN 1 ELSE 0 END) as kebakaran_count,
                         SUM(CASE WHEN jenis_kejadian = "penyelamatan" THEN 1 ELSE 0 END) as penyelamatan_count')
            ->first();

        // Check if there's no data, then set counts to zero
        $yearlyData[$yearItem] = [
            'kebakaran_count' => $yearlyCounts ? $yearlyCounts->kebakaran_count : 0,
            'penyelamatan_count' => $yearlyCounts ? $yearlyCounts->penyelamatan_count : 0,
        ];
    }

    // Prepare data for the yearly chart
    $yearlyLabels = array_keys($yearlyData);
    $yearlyKebakaranData = array_column($yearlyData, 'kebakaran_count');
    $yearlyPenyelamatanData = array_column($yearlyData, 'penyelamatan_count');


        return view('public.dashboard', compact('berita', 'labels', 'kebakaranData', 'penyelamatanData', 'year', 'years', 'yearlyLabels', 'yearlyKebakaranData', 'yearlyPenyelamatanData'));
    }


public function information()
{
    return view('public.information'); // Pass berita directly
}

public function berita_public() {
        $berita = Berita::all();
        return view('public/berita_public',compact('berita'));
    }

// public function berita_isi_public() {
//     $berita = Berita::all();
//     return view('public/berita_isi_public',compact('berita'));
// }

public function berita_isi_public($id) {
    $berita = Berita::find($id);
    if (!$berita) {
        abort(404, 'Berita tidak ditemukan.');
    }
    $recentPosts = Berita::orderBy('created_at', 'desc')->take(5)->get(); // Misal menampilkan 5 berita terbaru
    return view('public.berita_isi_public', compact('berita', 'recentPosts'));
}

}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class PublicController extends Controller
// {
//    public function information() {
//         return view('public/information');
//    }

//    public function berita_public() {
//     return view('public/berita_public');
// }

// public function berita_isi_public() {
//     return view('public/berita_isi_public');
// }

// }
