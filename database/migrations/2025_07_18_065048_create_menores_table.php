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
        Schema::create('menores', function (Blueprint $table) {
            $table->id('id_menor');
            $table->foreignId('expediente_id')->constrained('expediente', 'id_expediente')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('iniciales');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('curp');
            $table->string('sexo');
            $table->string('nacionalidad');
            $table->boolean('discapacidad');
            $table->text('tipo_discapacidad')->nullable();
            // $table->foreignId('equipo_id')->constrained('equipo', 'id_equipo')->onDelete('cascade');
            $table->date('fecha_puesta');
            $table->text('ubicacion_actual');
            $table->string('autoridad_ingresa');
            $table->text('motivo_ingreso')->nullable();
            $table->foreignId('albergue_id')->constrained('albergue', 'id_albergue')->onDelete('cascade');
            // $table->foreignId('estatus_id')->constrained('estatus', 'id_status')->onDelete('cascade');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menores');
    }
};
