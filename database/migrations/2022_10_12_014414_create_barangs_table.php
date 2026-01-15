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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();

            $table->string('nama_barang');
            $table->string('foto');
            $table->text('deskripsi');
            $table->double('harga');
            $table->integer('berat');
            $table->integer('stock');
            $table->integer('diskon')->nullable();
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
        Schema::dropIfExists('barangs');
    }
};
