<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Proses login
    public function autentikasi(Request $request) // Pastikan nama metode ini sama
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Siapkan data untuk autentikasi
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Coba autentikasi pengguna
        if (Auth::attempt($data)) {
            // Jika berhasil, redirect ke halaman DashboardAdmin
            return redirect()->route('DashboardAdmin');
        } else {
            // Jika gagal, redirect kembali ke halaman login dengan pesan kesalahan
            return redirect()->route('Login')->with('failed', 'Email atau Password anda salah');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
