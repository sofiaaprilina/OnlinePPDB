<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('siswa');
            $table->string('ortu');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('sekolah')->nullable();
            $table->string('bayar');
            $table->enum('status', ['Terkonfirmasi', 'Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->timestamp('tgl_daftar')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
}
