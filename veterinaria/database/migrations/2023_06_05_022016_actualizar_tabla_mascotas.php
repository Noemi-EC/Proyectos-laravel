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
        Schema::table('mascotas', function (Blueprint $table) {
            $table->enum('genero', ['Hembra', 'Macho']);
            $table->enum('tamanio', ['Pequeño', 'Mediano', 'Grande']);
            // campo id_tipo_animal, que sería una clave foránea de la tabla
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            // $table->enum('genero', ['Hembra', 'Macho']);
            // $table->enum('tamanio', ['Pequeño', 'Mediano', 'Grande']);
        });
    }
};
