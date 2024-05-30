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
            $table->datetime('data_marcacao')
                ->default(DB::raw('CURRENT_TIMESTAMP()'));
            $table->datetime('data_consulta')
                ->default(DB::raw('CURRENT_TIMESTAMP()'));
            $table->timestamps();
            $table->enum('status', ['Marcada', 'Cancelada', 'Aberta', 'Feita']);
            $table->foreignId('tipoconsulta_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('paciente_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('medico_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
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
