<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->float('custo');
            $table->datetime('data_marcacao')->default(DB::raw('CURRENT_TIMESTAMP()'));
            $table->datetime('data_consulta')->default(DB::raw('CURRENT_TIMESTAMP()'));
            $table->unsignedbigInteger('fk_paciente');
            $table->unsignedbigInteger('fk_medico');
            $table->timestamps();
            $table->foreign('fk_paciente')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_medico')->references('id')->on('medicos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
