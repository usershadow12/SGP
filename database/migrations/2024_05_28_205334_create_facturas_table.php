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
            $table->enum('tipo_pagamento', ['Dinheiro', 'Transferencia', 'Cartao', 'Parcelado']);
            $table->float('total');
            $table->float('troco')->default('0.0');
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
        Schema::dropIfExists('facturas');
    }
};
