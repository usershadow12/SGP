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
            $table->string('bi', 14)->unique();
            $table->string('nome', 20);
            $table->string('sobrenome', 30);
            $table->enum('sexo', ['M', 'F']);
            $table->integer('idade');
            $table->string('ordem')->unique();
            $table->string('contacto1')->unique();
            $table->string('contacto2')->nullable()->unique();
            $table->string('morada');
            $table->timestamps();
            $table->foreignId('especialidade_id')
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
        Schema::dropIfExists('medicos');
    }
};
