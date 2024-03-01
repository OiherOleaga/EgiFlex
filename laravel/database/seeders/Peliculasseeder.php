<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelicula;

class Peliculasseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $url = "http://localhost/media";
        $peliculas = [
            [
                'titulo' => 'Barbie',
                'director' => 'Director de Barbie',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Descripción de la película Barbie.',
                'duracion' => 12,
                'archivo' => $url . '/peliculas/barbie.mp4',
                'portada' => $url . '/portadas/barbie.jpg',
                'poster' => $url . '/posters/barbie.jpg',
            ],
            [
                'titulo' => 'Oppenheimer',
                'director' => 'Director de Oppenheimer',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Descripción de la película Oppenheimer.',
                'duracion' => 34,
                'archivo' => $url . '/peliculas/oppenheimer.mp4',
                'portada' => $url . '/portadas/oppen.jpg',
                'poster' =>  $url . '/posters/oppenheimer.jpg',
            ],
            [
                'titulo' => 'The Suicide Squad',
                'director' => 'James Gunn',
                'ano_lanzamiento' => '2021-01-01',
                'sinopsis' => 'Descripción de la película The Suicide Squad.',
                'duracion' => 12,
                'archivo' => $url . '/peliculas/suicide_squad.mp4',
                'portada' => $url . '/portadas/El_Escuadraon_Suicida.jpg',
                'poster' => $url . '/posters/the-suicide-squad.jpg',
            ],
            [
                'titulo' => 'Wonka',
                'director' => 'Paul King',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Descripción de la película Wonka.',
                'duracion' => 23,
                'archivo' => $url  . '/peliculas/wonka.mp4',
                'portada' => $url . '/portadas/wonka.jpg',
                'poster' => $url . '/posters/wonka.jpg',
            ],
        ];



        // Insertar las películas en la base de datos
        foreach ($peliculas as $pelicula) {
            Pelicula::create($pelicula);
        }
    }
}
