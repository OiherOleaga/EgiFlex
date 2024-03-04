<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('historial_peliculas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelicula');
            $table->foreign('id_pelicula')->references('id')->on('peliculas')->onDelete('cascade');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('tiempo');
            $table->boolean('visto')->default(false);
            $table->boolean('viendo')->default(true);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_peliculas');
    }
};
