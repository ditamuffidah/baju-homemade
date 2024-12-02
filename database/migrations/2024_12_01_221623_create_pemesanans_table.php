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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('jenis_baju');
            $table->string('ukuran');
            $table->string('jenis_kain')->nullable();
            $table->string('desain_khusus')->nullable();
            $table->date('estimasi_selesai')->nullable();
            $table->enum('status', ['Pending', 'Diproses', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
