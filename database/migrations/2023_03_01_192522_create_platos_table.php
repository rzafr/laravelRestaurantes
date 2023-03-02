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
        Schema::create('platos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('foto');
            $table->double('precio', 4, 2);
            $table->enum('categoria', ['tradicional', 'italiana', 'china', 'hamburgueseria']);
            $table->timestamps();
            $table->foreignId('restaurante_id')->constrained('restaurantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platos');
    }
};
