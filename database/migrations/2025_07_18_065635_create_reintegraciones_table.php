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
        Schema::create('reintegraciones', function (Blueprint $table) {
            $table->id('id_reintegracion');
            $table->foreignId('menor_id')->constrained('menores', 'id_menor');
            $table->string('tipo_reintegracion');
            $table->date('fecha');
            $table->text('detalles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reintegraciones');
    }
};
