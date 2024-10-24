<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $table = 'pelaporan';

    protected $fillable = [
        'kejadian',
        'jenis_kejadian',
        'hari_kejadian',
        'laporan_masuk',
        'berangkat',
        'tiba',
        'selesai',
        'lokasi',
        'pelapor',
        'pemilik',
        'penyebab',
        'kerugian',
        'korban',
        'kendala',
        'mobil_dinas',
        'personil',
    ];

    public function personnels()
{
    return $this->belongsToMany(Personil::class);
}

    protected $casts = [
        'personil' => 'array', // Cast personil as array
    ];
}
