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
        Schema::table('tbl_peserta', function (Blueprint $table) {
            $table->string('setuju_syarat_ketentuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_peserta', function (Blueprint $table) {
            $table->dropColumn('setuju_syarat_ketentuan');
        });
    }
};
