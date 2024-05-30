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
        Schema::create('hconsultas', function (Blueprint $table) {
            $table->id();
            $table->string('exame');
            $table->string('diagnostico');
            $table->string('observacoes')->nullable();
            $table->timestamps();
            $table->foreignId('consulta_id')
            ->contrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hconsultas');
    }
};
