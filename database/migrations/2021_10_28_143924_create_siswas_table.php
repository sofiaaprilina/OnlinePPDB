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
            $table->string('nama');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('agama')->nullable();
            $table->string('alamat');
            $table->string('nm_ayah')->nullable();
            $table->string('kj_ayah')->nullable();
            $table->string('no_ayah')->nullable();
            $table->string('nm_ibu')->nullable();
            $table->string('kj_ibu')->nullable();
            $table->string('no_ibu')->nullable();
            $table->string('nm_wali')->nullable();
            $table->string('kj_wali')->nullable();
            $table->string('no_wali')->nullable();
            $table->string('email');
            $table->string('akte')->nullable();
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('siswas', function($table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
