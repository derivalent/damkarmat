<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PublicControllerControllerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\PelaporanController;


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

Route::get('/berita_isi_public', [PublicController::class, 'berita_isi_public']);

Route::get('/dokumentasi_public', [PublicController::class, 'dokumentasi_public']);

// Route::get('/berita_isi_public', [BeritaController::class, 'show_berita'])->name('berita.isi');

// Route::get('/berita_isi_public', [BeritaController::class,'show_berita']);



Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/login', [LoginController::class, 'autentikasi'])->name('Autentikasi'); // Pastikan nama metode konsisten
Route::post('/logout', [LoginController::class, 'logout'])->name('Logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // dashboard admin
    Route::get('/dashboard_admin', [AdminController::class, 'dashboard_admin'])->name('DashboardAdmin');
    // Route::get('/personil', [AdminController::class, 'personil'])->name('Personil'); //button untuk mengakses view kelola personil

    // kelola personil
    Route::get('personil', [PersonilController::class, 'index'])->name('Personil.index');
    Route::get('personil/create', [PersonilController::class, 'create'])->name('Personil.create');
    Route::post('personil/store', [PersonilController::class, 'store'])->name('Personil.store');
    Route::get('personil/{personil}/edit', [PersonilController::class, 'edit'])->name('Personil.edit');
    Route::put('personil/{personil}', [PersonilController::class, 'update'])->name('Personil.update');
    Route::delete('personil/{personil}', [PersonilController::class, 'destroy'])->name('Personil.destroy');

    // pelaporan
    Route::get('pelaporan', [PelaporanController::class, 'index'])->name('Pelaporan.index'); // Menampilkan daftar laporan
    Route::get('pelaporan/create', [PelaporanController::class, 'create'])->name('Pelaporan.create'); // Form untuk membuat laporan
    Route::post('pelaporan', [PelaporanController::class, 'store'])->name('Pelaporan.store'); // Menyimpan laporan baru
    Route::get('pelaporan/{id}/edit', [PelaporanController::class, 'edit'])->name('Pelaporan.edit'); // Form untuk mengedit laporan
    Route::put('pelaporan/{id}', [PelaporanController::class, 'update'])->name('Pelaporan.update'); // Memperbarui laporan
    Route::delete('pelaporan/{id}', [PelaporanController::class, 'destroy'])->name('Pelaporan.destroy'); // Menghapus laporan

    //user
    Route::get('/user', [UserController::class, 'index'])->name('User.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('User.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('User.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('User.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('User.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('User.destroy');
});
