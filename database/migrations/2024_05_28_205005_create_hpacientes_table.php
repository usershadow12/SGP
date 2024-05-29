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
        Schema::create('hpacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('fk_paciente');
            $table->string('antecendente')->nullable();
            $table->string('historico_familiar')->nullable();
            $table->string('alergia')->nullable();
            $table->timestamps();
            $table->foreign('fk_paciente')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hpacientes');
    }
};
