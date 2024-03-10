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
        Schema::create('episodios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_temporada');
            $table->foreign('id_temporada')->references('id')->on('temporadas')->onDelete('cascade');
            $table->string('titulo');
            $table->integer('numero_episodio');
            $table->float('duracion');
            $table->text('sinopsis');
            $table->date('fecha_estreno');
            $table->char('archivo', 255);
            $table->char('portada');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodios');
    }
};
