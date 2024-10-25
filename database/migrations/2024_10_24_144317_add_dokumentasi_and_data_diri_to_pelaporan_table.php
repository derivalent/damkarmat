<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pelaporan', function (Blueprint $table) {
            $table->string('dokumentasi')->nullable();
            $table->string('data_diri')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pelaporan', function (Blueprint $table) {
            $table->dropColumn(['dokumentasi', 'data_diri']);
        });
    }

};
