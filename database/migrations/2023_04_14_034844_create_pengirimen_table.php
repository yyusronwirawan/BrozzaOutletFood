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
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_truk');
            $table->foreign('id_truk')->references('id')->on('truks');
            $table->unsignedBigInteger('id_supir');
            $table->foreign('id_supir')->references('id')->on('supirs');
            $table->unsignedBigInteger('id_jadwal_pengiriman');
            $table->foreign('id_jadwal_pengiriman')->references('id')->on('jadwal_pengirimen');
            $table->unsignedBigInteger('id_pemesanan');
            $table->foreign('id_pemesanan')->references('id')->on('pemesanans');
            $table->String('status_pengiriman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimen');
    }
};
