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
        Schema::create('expediente_judicial', function (Blueprint $table) {
            $table->id('id_expediente_judicial');
            $table->foreignId('menor_id')->constrained('menor', 'id_menor')->onDelete('cascade');
            $table->string('autoridad_judicial'); 
            $table->string('estado_procesal');
            $table->date('fecha_inicio_proceso')->nullable();
            $table->string('carpeta_investigacion')->nullable();
            $table->text('observaciones_judiciales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expediente_judicial');
    }
};
