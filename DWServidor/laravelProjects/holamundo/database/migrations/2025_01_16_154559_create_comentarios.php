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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedidos_id');
            $table->string('autor')->default('Anonimo');
            $table->text('contenido');
            $table->timestamp('fecha')->useCurrent();


            $table->timestamps();
            $table->foreign('pedidos_id')->references('id')->on('pedidos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
