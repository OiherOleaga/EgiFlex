<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorialSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxSeries = 24;
        $maxEpisodios = 100;


        for ($i = 1; $i <= 200; $i++) { 
            DB::table('historial_series')->insert([
                'serie_id' => rand(1, $maxSeries),
                'cliente_id' => 5,
                'episodio_id' => rand(1, $maxEpisodios),
                'tiempo' => time() - rand(0, 3600 * 24 * 30), 
                'visto' => rand(0, 1), 
                'viendo' => rand(0, 1), 
            ]);
        }
    }
}

