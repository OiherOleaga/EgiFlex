<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaSerie;
use App\Models\Serie;
use App\Models\Categoria;

class CategoriasSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las series y categorías
        $series = Serie::all();
        $categorias = Categoria::all();

        // Recorrer cada serie y asignar una categoría aleatoria
        foreach ($series as $serie) {
            // Obtener una categoría aleatoria
            $categoria = $categorias->random();

            // Crear una relación entre la serie y la categoría
            CategoriaSerie::create([
                'serie_id' => $serie->id,
                'categoria_id' => $categoria->id,
            ]);
        }
    }
}
