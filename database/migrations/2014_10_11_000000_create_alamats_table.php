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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('alamat');
            $table->string('kode_pos');
            $table->foreignId('kecamatan_id')->references('id')->on('kecamatans')
                ->onDelete('restrict');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('restrict');
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
        Schema::dropIfExists('daftar_alamats');
    }
};
