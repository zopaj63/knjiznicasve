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
        Schema::create('posudbas', function (Blueprint $table) {
            $table->id();
            //$table->foreignId("id_clan")->constrained("clans");
            //$table->foreignId("id_knjiga")->constrained("knjigas");
            $table->unsignedBigInteger("id_clan");
            $table->unsignedBigInteger("id_knjiga"); // ručno dodajemo id s nazivom
            $table->date("datum_posudbe");
            $table->date("datum_vracanja")->nullable();
            $table->timestamps();

            $table->foreign("id_clan")->references("id")->on("clans")->onDelete("restrict")->onUpdate("cascade");
            $table->foreign("id_knjiga")->references("id")->on("knjigas")->onDelete("restrict")->onUpdate("cascade");

            // $table->unique(["id_clan", "id_knjiga"]); u slučaju veze 1-1, jedan clan samo jednu knjigu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posudbas');
    }
};
