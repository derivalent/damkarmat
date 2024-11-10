<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanTable extends Migration
{
    public function up()
    {
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id();
            $table->string('kejadian'); // Kejadian
            $table->enum('jenis_kejadian', ['kebakaran', 'penyelamatan']); // Jenis Kejadian
            $table->date('hari_kejadian'); // Hari Kejadian
            $table->time('laporan_masuk'); // Waktu Laporan Masuk
            $table->time('berangkat'); // Waktu Berangkat
            $table->time('tiba'); // Waktu Tiba
            $table->time('selesai'); // Waktu Selesai
            $table->string('lokasi')->nullable(); // Lokasi
            $table->string('pelapor')->nullable(); // Pelapor
            $table->string('data_diri')->nullable(); // Data diri
            $table->string('pemilik')->nullable(); // Pemilik
            $table->text('penyebab')->nullable(); // Penyebab
            $table->text('kerugian')->nullable(); // Kerugian
            $table->text('korban')->nullable(); // Korban
            $table->string('dokumentasi')->nullable(); //Dokumentasi
            $table->text('kendala')->nullable(); // Kendala
            $table->string('mobil_dinas')->nullable(); // Mobil Dinas
            $table->json('personil'); // Personil
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelaporan');
    }
}
