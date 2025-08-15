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
        Schema::create('atenciones', function (Blueprint $table) {
            $table->id('id_atencion');
            $table->foreignId('menor_id')->constrained('menores', 'id_menor')->onDelete('cascade');
            $table->boolean('seguimiento_juridico');
            $table->boolean('seguimiento_psicologico');
            $table->boolean('seguimiento_trabajo_social');
            $table->text('detalles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atenciones');
    }
};
