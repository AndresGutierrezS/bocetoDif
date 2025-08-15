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
        Schema::create('ubicacion_actual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menor_id')->constrained('menores','id_menor')->onDelete('cascade');
            $table->string('tipo_ubicacion');
            $table->string('nombre');
            $table->string('parentesco')->nullable();
            $table->string('estatus');
            $table->text('direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicacion_actual');
    }
};
