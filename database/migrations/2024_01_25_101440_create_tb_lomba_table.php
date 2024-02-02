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
        Schema::create('tbl_lomba', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lomba');
            $table->string('slug');
            $table->string('gambar')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('tanggal_pendaftaran')->nullable();
            $table->string('tanggal_perlombaan')->nullable();
            $table->string('pic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lomba');
    }
};
