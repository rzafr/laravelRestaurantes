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
            $table->enum('estado', ['recibido', 'finalizado', 'entregado', 'cancelado']);
            $table->timestamps();
            $table->foreignId('cliente_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('restaurante_id')->constrained('restaurantes')->onDelete('cascade');
            $table->foreignId('repartidor_id')->constrained('users')->onDelete('cascade');
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
