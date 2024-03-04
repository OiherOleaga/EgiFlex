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
        Schema::create('historial_episodios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('episodio_id');
            $table->foreign('episodio_id')->references('id')->on('episodios')->onDelete('cascade');
            $table->unsignedBigInteger('historial_serie_id');
            $table->foreign('historial_serie_id')->references('id')->on('historial_series')->onDelete('cascade');
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
        Schema::dropIfExists('historial_episodios');
    }
};
