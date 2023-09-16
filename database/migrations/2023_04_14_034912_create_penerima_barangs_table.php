<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerima_barangs', function (Blueprint $table) {
            $table->id();
            $table->date('Tanggal')->nullable();
            // $table->unsignedBigInteger('id_sirkulasi');
            // $table->foreign('id_sirkulasi')->references('id')->on('sirkulasi_barangs');
            $table->unsignedBigInteger('id_outlet');
            $table->foreign('id_outlet')->references('id')->on('outlets');
            $table->unsignedBigInteger('id_pengiriman');
            $table->foreign('id_pengiriman')->references('id')->on('pengirimen');
            $table->String ('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_barangs');
    }
};
