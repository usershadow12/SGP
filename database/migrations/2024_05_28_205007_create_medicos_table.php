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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('bi', 9)->unique();
            $table->string('nome', 20);
            $table->string('sobrenome', 30);
            $table->enum('sexo', ['M', 'F']);
            $table->float('peso');
            $table->integer('idade');
            $table->string('ordem')->unique();
            $table->string('contacto1');
            $table->string('contacto2')->nullable();
            $table->string('morada');
            $table->unsignedbigInteger('fk_especialidade');
            $table->timestamps();
            $table->foreign('fk_especialidade')->references('id')->on('especialidades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
