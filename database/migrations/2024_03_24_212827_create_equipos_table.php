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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion', 200);
            $table->foreignId('id_marca')->nullable()->constrained('marcas')->cascadeOnUpdate()->nullOnDelete();
            $table->string('modelo', 30)->nullable();
            $table->string('serie', 50)->nullable();
            $table->string('serietec', 50)->unique();
            $table->string('estado', 30);
            $table->string('slug', 50)->unique();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
