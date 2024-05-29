<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prescricoes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data')->default(DB::raw('CURRENT_TIMESTAMP()'));
            $table->text('medicamento');
            $table->integer('duracao');
            $table->text('descricao');
            $table->text('indicacao_especial');
            $table->unsignedbigInteger('fk_consulta');
            $table->timestamps();
            $table->foreign('fk_consulta')->references('id')->on('consultas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescricoes');
    }
};
