<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen', function (Blueprint $table) {
            $table->increments('kode_customer', 8);
            $table->string('kode_wilayah', 7);
            $table->string('nama');
            $table->string('alamat');
            $table->enum('gender', ['L', 'P']);
            $table->string('no_ktp', 16);
            $table->string('no_telp', 15);
            $table->timestamps();

            $table->foreign('kode_wilayah')->references('kode_wilayah')->on('wilayah');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumen');
    }
};
