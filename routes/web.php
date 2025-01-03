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
use App\Http\Controllers\TahunController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\DokumentasiController;


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

// Route::get('/dashboard', function () {
//  return view('public/dashboard');
// });

Route::post('/admin/select-year', [AdminController::class, 'dashboard_admin'])->name('admin.selectYear');
// Route::get('/public/selectYear', [PublicController::class, 'dashboard_public'])->name('public.selectYear');
Route::post('/public/selectYear', [PublicController::class, 'dashboard_public'])->name('public.selectYear');


Route::get('/dashboard', [PublicController::class, 'dashboard_public'])->name('Dashboard_public');

// Route::get('/', [AdminController::class, 'dashboard_admin']);
// Route::get('/dashboard', [AdminController::class, 'dashboard_admin'])->name('Dashboard_public');


// Route::get('/information', function () {
//     return view('public.information');
// });

Route::get('/information', [PublicController::class, 'information'])->name('Information');


Route::get('/dokumentasi', [DokumentasiController::class, 'index_public'])->name('dokumentasi_public');

Route::get('/berita_public', [PublicController::class, 'berita_public'])->name('BeritaPublic');
Route::get('/berita_isi_public/{id}', [PublicController::class, 'berita_isi_public'])->name('BeritaIsiPublic');




Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/login', [LoginController::class, 'autentikasi'])->name('Autentikasi'); // Pastikan nama metode konsisten
Route::post('/logout', [LoginController::class, 'logout'])->name('Logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // dashboard admin
    Route::get('/dashboard_admin', [AdminController::class, 'dashboard_admin'])->name('DashboardAdmin');
    Route::get('tahun', [TahunController::class, 'tahun'])->name('Tahun.index'); // Display list of years
    Route::get('tahun/create', [TahunController::class, 'create'])->name('Tahun.create'); // Show form to create a new year
    Route::post('tahun', [TahunController::class, 'store'])->name('Tahun.store'); // Store a new year
    Route::get('tahun/{tahun}/edit', [TahunController::class, 'edit'])->name('Tahun.edit'); // Show form to edit an existing year
    Route::put('tahun/{tahun}', [TahunController::class, 'update'])->name('Tahun.update'); // Update an existing year
    Route::delete('tahun/{tahun}', [TahunController::class, 'destroy'])->name('Tahun.destroy'); // Delete a year
    // Route::get('/personil', [AdminController::class, 'personil'])->name('Personil'); //button untuk mengakses view kelola personil

    // Kegiatan Edukasi->belajar
    // Route::get('index', [PelaporanController::class, 'index'])->name('KegiatanEdukasi.index');

    // Menampilkan daftar belajar
    Route::get('belajar', [BelajarController::class, 'index'])->name('belajar.index');
    Route::get('belajar/create', [BelajarController::class, 'create'])->name('belajar.create');
    Route::post('belajar', [BelajarController::class, 'store'])->name('belajar.store');
    Route::get('belajar/{id}/edit', [BelajarController::class, 'edit'])->name('belajar.edit');
    Route::put('belajar/{id}', [BelajarController::class, 'update'])->name('belajar.update');
    Route::delete('belajar/{id}', [BelajarController::class, 'destroy'])->name('belajar.destroy');

    //CRUD Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('Berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('Berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('Berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('Berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('Berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('Berita.destroy');

    // dokumentasi
    Route::get('dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
    Route::get('dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
    Route::post('dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::get('dokumentasi/{id}/edit', [DokumentasiController::class, 'edit'])->name('dokumentasi.edit');
    Route::put('dokumentasi/{id}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
    Route::delete('dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');

    // kelola personil
    Route::get('personil', [PersonilController::class, 'index'])->name('Personil.index');
    Route::get('personil/create', [PersonilController::class, 'create'])->name('Personil.create');
    Route::post('personil/store', [PersonilController::class, 'store'])->name('Personil.store');
    Route::get('personil/{personil}/edit', [PersonilController::class, 'edit'])->name('Personil.edit');
    Route::put('personil/{personil}', [PersonilController::class, 'update'])->name('Personil.update');
    Route::delete('personil/{personil}', [PersonilController::class, 'destroy'])->name('Personil.destroy');

    // pelaporan
    Route::prefix('pelaporan')->group(function () {
        Route::get('pelaporan', [PelaporanController::class, 'index'])->name('Pelaporan.index'); // Menampilkan daftar laporan tanpa filter
        Route::get('button_perkejadian', [PelaporanController::class, 'button_perkejadian'])->name('Pelaporan.button_perkejadian');
        Route::get('kebakaran', [PelaporanController::class, 'kebakaran'])->name('Pelaporan.kebakaran');
        Route::get('penyelamatan', [PelaporanController::class, 'penyelamatan'])->name('Pelaporan.penyelamatan');
        Route::get('pelaporan/create', [PelaporanController::class, 'create'])->name('Pelaporan.create'); // Form untuk membuat laporan
        Route::post('pelaporan', [PelaporanController::class, 'store'])->name('Pelaporan.store'); // Menyimpan laporan baru
        Route::get('pelaporan/{id}/edit', [PelaporanController::class, 'edit'])->name('Pelaporan.edit'); // Form untuk mengedit laporan
        Route::put('pelaporan/{id}', [PelaporanController::class, 'update'])->name('Pelaporan.update'); // Memperbarui laporan
        Route::delete('pelaporan/{id}', [PelaporanController::class, 'destroy'])->name('Pelaporan.destroy'); // Menghapus laporan
        // print pelaporan
        // Route::get('pelaporan/print', [PelaporanController::class, 'print'])->name('Pelaporan.print');
        Route::get('pelaporan/filter-print', [PelaporanController::class, 'filterPrint'])->name('Pelaporan.filterPrint');
        Route::get('pelaporan/print', [PelaporanController::class, 'print'])->name('Pelaporan.print');
    });


    //user
    Route::middleware(['role:1'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('User.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('User.create');
        Route::post('/admin/user/store', [UserController::class, 'store'])->name('User.store');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('User.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('User.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('User.destroy');
    });
});
