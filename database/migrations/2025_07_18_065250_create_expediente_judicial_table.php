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
            $table->id('id_expediente_judi');
            $table->foreignId('menor_id')->constrained('menor', 'id_menor');
            $table->text('estado_procesal');
            $table->text('archivo')->nullable();
            $table->string('in_menor');
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
