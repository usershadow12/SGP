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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data')->default(DB::raw('CURRENT_TIMESTAMP()'));
            $table->enum('tipo_pagamento', ['Dinheiro', 'Transferencia', 'Cartao']);
            $table->float('total');
            $table->float('troco')->default('0.0');
            $table->enum('status', ['Aberta', 'Paga'])->default('Aberta');
            $table->timestamps();
            $table->foreignId('consulta_id')
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
        Schema::dropIfExists('facturas');
    }
};
