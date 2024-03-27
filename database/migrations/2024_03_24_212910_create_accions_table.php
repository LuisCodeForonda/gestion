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
        Schema::create('accions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_equipo')->nullable()->constrained('equipos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_user')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->text('descripcion', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accions');
    }
};
