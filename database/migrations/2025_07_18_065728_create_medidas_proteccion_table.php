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
        Schema::create('medidas_proteccion', function (Blueprint $table) {
            $table->id('id_medida');
            $table->foreignId('menor_id')->constrained('menores', 'id_menor')->onDelete('cascade');
            $table->text('detalles_medida');
            $table->string('tipo_medida');
            $table->text('plan_restitucion')->nullable();
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas_proteccion');
    }
};
