<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('pemesanans', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            //
        });
    }
};
