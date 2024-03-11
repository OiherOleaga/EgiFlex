<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorialPeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxPeliculas = 19; 

        for ($i = 1; $i <= 200; $i++) { 
            DB::table('historial_peliculas')->insert([
                'id_pelicula' => rand(1, $maxPeliculas),
                'id_cliente' => 5,
                'tiempo' => time() - rand(0, 3600 * 24 * 30), 
                'visto' => rand(0, 1), 
                'viendo' => rand(0, 1), 
            ]);
        }
    }
}
