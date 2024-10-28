<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class AdminController extends Controller
// {
// //     public function dashboard_admin() {
// //         return view('admin.dashboard.dashboard_admin');
// //    }


// }

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pelaporan;
use App\Models\Tahun;
use App\Models\Belajar;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard_admin(Request $request)
{
    $belajars = Belajar::all();
    // Get berita data sorted by 'created_at' in descending order
    $berita = Berita::orderBy('created_at', 'desc')->get();

    // Get the current year or the year passed from the request
    $year = $request->input('year', Carbon::now()->year); // Default to current year

    // Query for kebakaran and penyelamatan counts grouped by month
    $monthlyData = Pelaporan::selectRaw('MONTH(hari_kejadian) as month,
                                         SUM(CASE WHEN jenis_kejadian = "kebakaran" THEN 1 ELSE 0 END) as kebakaran_count,
                                         SUM(CASE WHEN jenis_kejadian = "penyelamatan" THEN 1 ELSE 0 END) as penyelamatan_count')
        ->whereYear('hari_kejadian', $year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Prepare data for the monthly chart
    $labels = [];
    $kebakaranData = [];
    $penyelamatanData = [];

    // Fill the data arrays
    foreach ($monthlyData as $monthData) {
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

    // Return the admin dashboard view with the necessary data
    return view('admin.dashboard.dashboard_admin', compact('berita', 'labels', 'kebakaranData', 'penyelamatanData', 'year', 'years', 'yearlyLabels', 'yearlyKebakaranData', 'yearlyPenyelamatanData', 'belajars'));
}


}
