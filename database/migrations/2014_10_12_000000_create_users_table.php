<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik untuk login
            $table->timestamp('email_verified_at')->nullable(); // Timestamp verifikasi email
            $table->string('password'); // Password
            $table->string('telepon')->nullable(); // Telepon
            $table->string('nip')->nullable(); // NIP
            $table->string('jabatan')->nullable(); // Jabatan pengguna
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable(); // Jenis kelamin
            $table->string('tempat_lahir')->nullable(); // Tempat lahir
            $table->date('tanggal_lahir')->nullable(); // Tanggal lahir
            $table->string('pendidikan_terakhir')->nullable(); // Pendidikan terakhir
            $table->enum('status_pekerjaan', ['pns', 'pppk', 'honorer'])->default('pns'); // Status pekerjaan dengan default 'pns'
            $table->string('role')->nullable(); // Role pengguna, misalnya 'admin' atau 'user'
            $table->text('alamat')->nullable(); // Alamat pengguna
            $table->rememberToken(); // Token untuk remember me
            $table->timestamps(); // Timestamps created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
