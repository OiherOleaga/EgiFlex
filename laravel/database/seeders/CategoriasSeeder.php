<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array de datos de categorias
        $categorias = [
            ['nombre' => 'Acción'],
            ['nombre' => 'Comedia'],
            ['nombre' => 'Drama'],
            ['nombre' => 'Ciencia Ficción'],
            ['nombre' => 'Aventura'],
            ['nombre' => 'Terror'],
            ['nombre' => 'Animación'],
            ['nombre' => 'Fantasía'],
            ['nombre' => 'Suspenso'],
            ['nombre' => 'Romance'],
            ['nombre' => 'Documental'],
            ['nombre' => 'Crimen'],
            ['nombre' => 'Familia'],
            ['nombre' => 'Musical'],
            ['nombre' => 'Misterio'],
            ['nombre' => 'Biografía'],
            ['nombre' => 'Histórico'],
            ['nombre' => 'Guerra'],
            ['nombre' => 'Western'],
            ['nombre' => 'Deportes'],
        ];

        // Insertar las categorias en la base de datos
        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
