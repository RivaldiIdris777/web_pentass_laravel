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
            $table->string('no_peserta')->after('nama')->nullable();
            $table->string('url')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_peserta', function (Blueprint $table) {
            $table->dropColumn('no_peserta');
            $table->dropColumn('url');
        });
    }
};
