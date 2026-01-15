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
        Schema::create('checkout_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->date('tanggal');
            $table->double('total_harga');
            $table->string('snap_token', 36)->nullable();
            $table->enum('status', ['1', '2', '3', '4', '5', '6'])->default('1')->comment('1=Menunggu Pembayaran, 2=Menunggu Konfirmasi, 3=Perjalanan, 4=Pembelajaran, 5=Selesai, 6=Gagal')->nullable();
            $table->foreignId('pembelajaran_id')->references('id')->on('pembelajarans')
                ->onDelete('restrict');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('restrict');
            $table->foreignId('alamat_id')->references('id')->on('alamats')
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
        Schema::dropIfExists('checkout_pembelajarans');
    }
};
