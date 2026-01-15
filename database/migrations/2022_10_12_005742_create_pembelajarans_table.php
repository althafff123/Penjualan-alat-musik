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
        Schema::create('pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->double('tarif');
            $table->text('deskripsi');
            $table->string('nama_pembelajaran');
            $table->integer('diskon')->nullable();
            $table->foreignId('pelatih_id')->references('id')->on('pelatihs')
                ->onDelete('restrict');
            $table->foreignId('kategori_id')->references('id')->on('kategoris')
                ->onDelete('cascade');
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
        Schema::dropIfExists('pembelajarans');
    }
};
