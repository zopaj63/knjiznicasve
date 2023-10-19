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
        Schema::table('knjigas', function (Blueprint $table) {
            $table->boolean('posudena')->default(false); //dodajemo novu kolonu posudena u tablicu knjigas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knjigas', function (Blueprint $table) {
            $table->dropColumn('posudena'); // u slučaju roolback brišemo kolonu (nije potrebno, ali...)
        });
    }
};
