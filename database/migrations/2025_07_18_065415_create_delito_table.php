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
        Schema::create('delito', function (Blueprint $table) {
            $table->id('id_delito');
            $table->foreignId('menor_id')->constrained('menores', 'id_menor')->onDelete('cascade');
            $table->text('detalles_delito');
            $table->text('lugar_hechos');
            $table->foreignId('agencia_id')->constrained('agencia', 'id_agencia')->onDelete('cascade');
            $table->string('carpeta_investigacion');
            $table->string('no_denuncia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delito');
    }
};
