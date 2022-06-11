<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTampilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tampilans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no')->nullable();
            $table->string('kategori')->nullable();
            $table->string('file')->nullable();
            $table->string('link')->nullable();
            $table->string('judul')->nullable();
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
        Schema::dropIfExists('tampilans');
    }
}
