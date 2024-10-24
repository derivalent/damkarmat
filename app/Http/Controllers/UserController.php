<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // Menampilkan form untuk menambahkan pengguna baru
    public function create()
    {
        $roles = Role::all(); // Ambil semua data role
        return view('admin.user.create', compact('roles'));
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // \Log::info('Store method called', $request->all());
        // Validasi data yang diterima dari form
        $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan_terakhir' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'status_pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'role' => 'required|exists:roles,id_role', // Pastikan role juga divalidasi
        ]);
        // \Log::info('Store method called', $request->all());

        // dd($request->all());

        // Membuat pengguna baru dengan data yang telah divalidasi
        User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'jabatan' => $request->jabatan,
            'status_pekerjaan' => $request->status_pekerjaan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'role' => $request->role, // Tambahkan role di sini
        ]);

        // Redirect kembali ke index pengguna dengan pesan sukses
        return redirect()->route('User.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }



   // Menampilkan form edit pengguna
   public function edit($id)
   {
       // Cari pengguna berdasarkan ID
       $user = User::findOrFail($id);
       // Ambil semua data role untuk dropdown
       $roles = Role::all();
       return view('admin.user.edit', compact('user', 'roles'));
   }

   // Memperbarui data pengguna
   public function update(Request $request, $id)
   {
       // Validasi data yang diterima dari form
       $request->validate([
           'nip' => 'required|string|max:255',
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users,email,' . $id, // Pastikan email unik, kecuali untuk user yang sedang diedit
           'jenis_kelamin' => 'required|string',
           'tempat_lahir' => 'required|string|max:255',
           'tanggal_lahir' => 'required|date',
           'pendidikan_terakhir' => 'required|string|max:255',
           'jabatan' => 'required|string|max:255',
           'status_pekerjaan' => 'required|string',
           'alamat' => 'required|string',
           'telepon' => 'required|string|max:15',
           'role' => 'required|exists:roles,id_role',
       ]);

       // Cari pengguna berdasarkan ID
       $user = User::findOrFail($id);

       // Update data pengguna dengan data yang baru
       $user->update([
           'nip' => $request->nip,
           'name' => $request->name,
           'email' => $request->email,
           'jenis_kelamin' => $request->jenis_kelamin,
           'tempat_lahir' => $request->tempat_lahir,
           'tanggal_lahir' => $request->tanggal_lahir,
           'pendidikan_terakhir' => $request->pendidikan_terakhir,
           'jabatan' => $request->jabatan,
           'status_pekerjaan' => $request->status_pekerjaan,
           'alamat' => $request->alamat,
           'telepon' => $request->telepon,
           'role' => $request->role, // Update role
       ]);

       // Cek apakah password diubah, jika ya, maka update password
       if ($request->filled('password')) {
           $user->update([
               'password' => Hash::make($request->password),
           ]);
       }

       // Redirect kembali ke halaman index pengguna dengan pesan sukses
       return redirect()->route('User.index')->with('success', 'Pengguna berhasil diperbarui.');
   }


     // Menghapus pengguna
     public function destroy($id)
     {
         // Cari pengguna berdasarkan ID dan hapus
         $user = User::findOrFail($id);
         $user->delete();

         // Redirect ke halaman index pengguna dengan pesan sukses
         return redirect()->route('User.index')->with('success', 'Pengguna berhasil dihapus.');
     }
}
