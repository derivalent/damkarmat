<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

// class User extends Authenticatable implements MustVerifyEmail
// {
//     use HasFactory, Notifiable;

//     protected $table = 'users'; // Nama tabel

//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//         'telepon',
//         'nip',
//         'jabatan',
//         'jenis_kelamin',
//         'tempat_lahir',
//         'tanggal_lahir',
//         'pendidikan_terakhir',
//         'status_pekerjaan',
//         'role',
//         'alamat',
//     ];

//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     protected $casts = [
//         'email_verified_at' => 'datetime',
//         'tanggal_lahir' => 'date', // Mengcast tanggal_lahir ke tipe date
//     ];

//     /**
//      * Get the user's role.
//      *
//      * @return string|null
//      */
//     public function getRole()
//     {
//         return $this->role;
//     }

//     // Metode lainnya bisa ditambahkan sesuai kebutuhan
// }



// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class User extends Model
// {
//     use HasFactory;

//     protected $fillable = ['nip', 'name', 'email', 'password', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'pendidikan_terakhir', 'jabatan', 'status_pekerjaan', 'alamat', 'telepon', 'role'];

//     public function role()
//     {
//         return $this->belongsTo(Role::class, 'role', 'id_role');
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan Authenticatable
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Ubah dari Model ke Authenticatable
{
    // use HasFactory, Notifiable;

    // protected $fillable = [
    //     'nip', 'name', 'email', 'password', 'jenis_kelamin',
    //     'tempat_lahir', 'tanggal_lahir', 'pendidikan_terakhir',
    //     'jabatan', 'status_pekerjaan', 'alamat', 'telepon', 'role'
    // ];

    use HasFactory;

    protected $fillable = [
        'nip', 'name', 'email', 'password', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'pendidikan_terakhir',
        'jabatan', 'status_pekerjaan', 'alamat', 'telepon', 'role'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role', 'id_role');
    }

    // Pastikan untuk mengimplementasikan metode berikut jika perlu
    public function getAuthIdentifierName()
    {
        return 'email'; // atau kolom lain yang Anda gunakan untuk login
    }
}
