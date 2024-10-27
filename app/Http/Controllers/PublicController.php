<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class PublicController extends Controller
{

// public function dashboard_public()
// {
//     $berita = Berita::all(); // Fetch all berita records
//     $cards = $berita->map(function($item) {
//         return [
//             'imageUrl' => asset('storage/images_berita' . $item->gambar), // Adjust image path
//             'title' => $item->judul,
//             'description' => $item->isi, // Use the appropriate field for description
//             'link' => route('BeritaIsiPublic', $item->id), // Use the correct route
//         ];
//     });

//     // Pass the cards data to the view
//     return view('public.dashboard', ['cards' => $cards]);
// }

// public function dashboard_public()
// {
//     $berita = Berita::all(); // Fetch all berita records
//     return view('public.dashboard', ['berita' => $berita]); // Pass berita directly
// }

public function dashboard_public()
{
    // $berita = Berita::all(); // Fetch all berita records
    // return view('public.dashboard', compact('berita')); // Pass berita directly
    // Get berita data sorted by 'created_at' in descending order
    $berita = Berita::orderBy('created_at', 'desc')->get();
    return view('public.dashboard', compact('berita'));

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
