<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaPelicula;
use App\Models\Pelicula;
use App\Models\Categoria;

class CategoriasPelisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las pelis y categorías
        $pelis = Pelicula::all();
        $categorias = Categoria::all();

        // Recorrer cada serie y asignar una categoría aleatoria
        foreach ($pelis as $pelicula) {
            // Obtener una categoría aleatoria
            $categoria = $categorias->random();

            // Crear una relación entre la pelicula y la categoría
            CategoriaPelicula::create([
                'pelicula_id' => $pelicula->id,
                'categoria_id' => $categoria->id,
            ]);
        }
    }
}
