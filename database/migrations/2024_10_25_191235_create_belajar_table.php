<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('belajar', function (Blueprint $table) {
            $table->id();
            $table->string('audience');
            $table->date('hari');
            $table->time('jam');
            $table->enum('status', ['terjadwal', 'selesai']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('belajar');
    }
};
