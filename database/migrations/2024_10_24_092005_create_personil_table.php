<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonilTable extends Migration
{
    public function up()
    {
        Schema::create('personil', function (Blueprint $table) {
            $table->id();
            $table->string('personil'); // Nama personil
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personil');
    }
}


