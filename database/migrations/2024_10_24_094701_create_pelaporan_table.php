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
            $table->string('objek_kejadian');
            $table->enum('jenis_kejadian', ['kebakaran', 'non-kebakaran']);
            $table->date('hari_kejadian');
            $table->time('laporan_masuk');
            $table->time('berangkat');
            $table->time('tiba');
            $table->time('penanganan');
            $table->time('respon_time')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('pelapor')->nullable();
            $table->string('NIK')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'wanita'])->nullable();
            $table->string('pemilik')->nullable();
            $table->text('penyebab')->nullable();
            $table->text('kerugian')->nullable();
            $table->text('meninggal')->nullable();
            $table->text('luka_berat')->nullable();
            $table->text('luka_ringan')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->text('kendala')->nullable();
            $table->string('mobil_dinas')->nullable();
            $table->json('personil');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelaporan');
    }
}

