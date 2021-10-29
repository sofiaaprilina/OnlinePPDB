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
            $table->string('nama');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('agama');
            $table->string('alamat');
            $table->string('nm_ayah');
            $table->string('kj_ayah');
            $table->string('no_ayah');
            $table->string('nm_ibu');
            $table->string('kj_ibu');
            $table->string('no_ibu');
            $table->string('nm_wali')->nullable();
            $table->string('kj_wali')->nullable();
            $table->string('no_wali')->nullable();
            $table->string('email');
            $table->string('akte');
            $table->string('kk');
            $table->string('ktp');
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
