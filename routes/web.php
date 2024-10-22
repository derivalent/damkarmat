<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PublicControllerControllerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//public
Route::get('/', function () {
    // return view('welcome');
    return view('public/dashboard');
});

Route::get('/dashboard', function () {
    // return view('welcome');
    return view('public/dashboard');
});

Route::get('/information', function () {
    return view('public.information');
});

Route::get('/berita_public', function () {
    return view('public.berita_public');
});

Route::get('/berita_isi_public', [PublicController::class,'berita_isi_public']);

Route::get('/dokumentasi_public', [PublicController::class,'dokumentasi_public']);

// Route::get('/berita_isi_public', [BeritaController::class, 'show_berita'])->name('berita.isi');

// Route::get('/berita_isi_public', [BeritaController::class,'show_berita']);

//admin
Route::get('/dashboard_admin', [AdminController::class,'dashboard_admin']);

Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('Autentikasi');
Route::post('/logout', [LoginController::class, 'logout'])->name('Logout');

