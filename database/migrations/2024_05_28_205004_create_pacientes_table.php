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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('bi', 14)->unique();
            $table->string('nome', 20);
            $table->string('sobrenome', 30);
            $table->enum('sexo', ['M', 'F']);
            $table->float('peso');
            $table->integer('idade');
            $table->string('contacto1');
            $table->string('contacto2')->nullable();
            $table->string('morada');
            $table->foreignId('user_id')
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
        Schema::dropIfExists('pacientes');
    }
};
