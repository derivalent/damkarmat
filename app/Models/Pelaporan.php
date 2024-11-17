<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $table = 'pelaporan';

    protected $fillable = [
        'objek_kejadian',
        'jenis_kejadian',
        'hari_kejadian',
        'laporan_masuk',
        'berangkat',
        'tiba',
        'penanganan',
        'respon_time',
        'lokasi',
        'pelapor',
        'NIK',
        'jenis_kelamin',
        'pemilik',
        'penyebab',
        'kerugian',
        'meninggal',
        'luka_berat',
        'luka_ringan',
        'dokumentasi',
        'kendala',
        'mobil_dinas',
        'personil'
    ];

    public function personnels()
{
    return $this->belongsToMany(Personil::class);
}

    protected $casts = [
        'personil' => 'array', // Cast personil as array
    ];
}
