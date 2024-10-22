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
     public function Autentikasi(Request $request)
     {
         // Validasi input
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);

         // Attempt login menggunakan Auth
         if (Auth::attempt($credentials)) {
             // Regenerasi session untuk keamanan
             $request->session()->regenerate();

             // Redirect ke halaman dashboard setelah login sukses
             return redirect()->intended('/dashboard');
         }

         // Kembalikan ke halaman login jika gagal
         return back()->withErrors([
             'email' => 'Email atau password salah.',
         ])->onlyInput('email');
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
