<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idPendaftar')->unsigned();
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama')->nullable();
            $table->string('alamat');
            $table->string('nik_ayah')->nullable();
            $table->string('nm_ayah')->nullable();
            $table->string('kj_ayah')->nullable();
            $table->string('ph_ayah')->nullable();
            $table->string('no_ayah')->nullable();
            $table->enum('status_ayah', ['Masih Hidup', 'Meninggal'])->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nm_ibu')->nullable();
            $table->string('kj_ibu')->nullable();
            $table->string('ph_ibu')->nullable();
            $table->string('no_ibu')->nullable();
            $table->enum('status_ibu', ['Masih Hidup', 'Meninggal'])->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('nm_wali')->nullable();
            $table->string('kj_wali')->nullable();
            $table->string('ph_wali')->nullable();
            $table->string('no_wali')->nullable();
            $table->string('tanggungan')->nullable();
            $table->string('email');
            $table->string('akte')->nullable();
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();
            $table->string('gaji')->nullable();
            $table->enum('berkas', ['Terkonfirmasi', 'Belum Terkonfirmasi', 'Tidak Valid'])->default('Belum Terkonfirmasi');
            $table->enum('status', ['Lolos', 'Tidak Lolos'])->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->enum('keringanan', ['Ya', 'Tidak'])->default('Tidak');
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
        Schema::dropIfExists('siswas');
    }
}
