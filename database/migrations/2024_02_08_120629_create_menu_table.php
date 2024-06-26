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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->string('id_html')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('urutan')->nullable();
            $table->string('tipe_menu',['be','fe'])->default('be')->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
