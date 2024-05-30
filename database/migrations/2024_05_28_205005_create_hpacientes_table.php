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
            $table->string('antecendente')->nullable();
            $table->string('historico_familiar')->nullable();
            $table->string('alergia')->nullable();
            $table->foreignId('paciente_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
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
