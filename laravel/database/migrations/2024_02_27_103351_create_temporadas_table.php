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
        Schema::create('temporadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_serie');
            $table->foreign('id_serie')->references('id')->on('series')->onDelete('cascade');
            $table->integer('numero_temporada');
            $table->integer('numero_episodios');
            $table->date('fecha_estreno');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporadas');
    }
};
