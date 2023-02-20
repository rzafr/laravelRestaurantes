<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->enum('estado', ['recibido', 'finalizado', 'entregado', 'cancelado']);
            $table->timestamps();
            $table->foreignId('cliente_id')->constrained('users');
            $table->foreignId('restaurante_id')->constrained('restaurantes');
            $table->foreignId('repartidor_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
