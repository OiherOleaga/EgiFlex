<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Peliculasseeder::class);
        $this->call(SeriesSeeder::class);
        $this->call(TemporadasSeeder::class);
        $this->call(EpisodiosSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(AdministradoresSeeder::class);
        $this->call(CategoriasSeriesSeeder::class);
        $this->call(CategoriasPelisSeeder::class);
        $this->call(HistorialSeriesSeeder::class);
        $this->call(HistorialPeliculasSeeder::class);

    }
}
