<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Episodio;

class EpisodiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "http://localhost/media";
        $episodios = [
            // Episodios de Dragon ball, temporada 1
            [
                'id_temporada' => 1,
                'titulo' => 'Goku pesca',
                'numero_episodio' => 1,
                'duracion' => 20,
                'sinopsis' => 'Goku pesca tranquilamente hasta que un inesperado suceso cambia el rumbo de su vida',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/db01.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 1,
                'titulo' => 'Bulma esta loca',
                'numero_episodio' => 2,
                'duracion' => 11,
                'sinopsis' => 'Bulma se lleva a goku en busca de las bolas del dragon',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db02.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 1,
                'titulo' => '¿Porque tienes cola?',
                'numero_episodio' => 3,
                'duracion' => 19,
                'sinopsis' => 'Este chico no es humano ',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db03.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 1,
                'titulo' => 'Yamcha el guerrero',
                'numero_episodio' => 4,
                'duracion' => 21,
                'sinopsis' => 'En mitad del desierto un villano acecha',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db04.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            // Episodios de Dragon ball, temporada 2
            [
                'id_temporada' => 2,
                'titulo' => 'Quinta bola',
                'numero_episodio' => 5,
                'duracion' => 16,
                'sinopsis' => 'Goku y bulma hallan la quinta bola del dragon',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db05.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 2,
                'titulo' => 'A por ellos',
                'numero_episodio' => 6,
                'duracion' => 21,
                'sinopsis' => 'Comienza una feroz batalla',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db06.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 2,
                'titulo' => 'Sol despues de la lluvia',
                'numero_episodio' => 7,
                'duracion' => 26,
                'sinopsis' => 'GNuestros heroes al fin descansan',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db07.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 2,
                'titulo' => '¿Quien es krillin y porque esta calvo?',
                'numero_episodio' => 8,
                'duracion' => 23,
                'sinopsis' => 'Duro entrenamiento con iratxo dordoka',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db08.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 2,
                'titulo' => 'Otra mas',
                'numero_episodio' => 9,
                'duracion' => 16,
                'sinopsis' => 'Casi estan todas las bolas',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db05.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
            [
                'id_temporada' => 2,
                'titulo' => 'El fin',
                'numero_episodio' => 10,
                'duracion' => 26,
                'sinopsis' => 'Goku invoca al dragon y el final se avecina',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/db10.mp4',
                'portada' => $url . '/portadas/dragonball.jpg',
            ],
        ];

        foreach ($episodios as $episodio) {
            Episodio::create($episodio);
        }
    }
}
