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
        Schema::create('pedido_plato', function (Blueprint $table) {
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('plato_id')->constrained('platos');
            $table->timestamps();
            $table->primary(['pedido_id', 'plato_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_plato');
    }
};
