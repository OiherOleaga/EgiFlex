<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serie;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "http://localhost/media";


        $series = [
            [
                'titulo' => 'La Casa de Papel',
                'director' => 'Álex Pina',
                'ano_lanzamiento' => '2017-01-01',
                'sinopsis' => 'Una banda de criminales planea y ejecuta asaltos elaborados a la Fábrica Nacional de Moneda y Timbre de España.',
                'portada' => $url . '/portadas/casapapel.jpg',
                'poster' => $url . '/posters/money-heist.jpg',
            ],
            [
                'titulo' => 'Chainsaw Man',
                'director' => 'Tatsuki Fujimoto',
                'ano_lanzamiento' => '2018-01-01',
                'sinopsis' => 'Un hombre se convierte en un cazador de demonios después de ser resucitado por su perro demonio.',
                'portada' => $url . '/portadas/chainsaw_man.jpg',
                'poster' => $url . '/posters/chainsawman.jpg',
            ],
            [
                'titulo' => 'Cyberpunk',
                'director' => 'Paco Gonzalez',
                'ano_lanzamiento' => '2021-01-01',
                'sinopsis' => 'Descripción de la serie Cyberpunk.',
                'portada' => $url . '/portadas/cyberpunk.jpg',
                'poster' => $url . '/posters/cyberpunk.jpg',
            ],
            [
                'titulo' => 'Dragon Ball',
                'director' => 'Akira Toriyama',
                'ano_lanzamiento' => '1986-01-01',
                'sinopsis' => 'Goku y sus amigos protegen la Tierra de villanos que desean conquistar o destruir el mundo.',
                'portada' => $url . '/portadas/dragonball.jpg',
                'poster' => $url . '/posters/dragonball.jpg',
            ],
            [
                'titulo' => 'Jujutsu Kaisen',
                'director' => 'Sunghoo Park',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Un estudiante se convierte en un cazador de demonios después de un encuentro con una criatura maldita.',
                'portada' => $url . '/portadas/JJK.jpg',
                'poster' => $url . '/posters/jujutsukaisen0.jpg',
            ],
            [
                'titulo' => 'Demon Slayer',
                'director' => 'Haruo Sotozaki',
                'ano_lanzamiento' => '2019-01-01',
                'sinopsis' => 'Un joven se convierte en cazador de demonios para vengar la muerte de su familia y liberar a su hermana de una maldición.',
                'portada' => $url . '/portadas/kimetsu.jpg',
                'poster' => $url . '/posters/demon-slayer.jpg',
            ],
            [
                'titulo' => 'Miercoles',
                'director' => 'Director de Miercoles',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Descripción de la serie Miercoles.',
                'portada' => $url . '/portadas/miercoles.jpg',
                'poster' => $url . '/posters/wednesday.jpg',
            ],
            [
                'titulo' => 'One Piece',
                'director' => 'Eiichiro Oda',
                'ano_lanzamiento' => '1999-01-01',
                'sinopsis' => 'Monkey D. Luffy y su tripulación buscan el tesoro más grande del mundo, conocido como el One Piece, para convertirse en el Rey de los Piratas.',
                'portada' => $url . '/portadas/onepiece.jpg',
                'poster' => $url . '/posters/onepiece.jpg',
            ],
            [
                'titulo' => 'Stranger Things',
                'director' => 'Hermanos Duffer',
                'ano_lanzamiento' => '2016-01-01',
                'sinopsis' => 'Un grupo de niños en un pequeño pueblo descubre eventos sobrenaturales y experimentos gubernamentales secretos cuando su amigo desaparece.',
                'portada' => $url . '/portadas/strangerthings.jpg',
                'poster' => $url . '/posters/strangerthings.jpg',
            ],
            [
                'titulo' => 'The Last of Us',
                'director' => 'Director de The Last of Us',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Descripción de la serie The Last of Us.',
                'portada' => $url . '/portadas/the-last-of-u.jpg',
                'poster' => $url . '/posters/the-last-of-us.jpg',
            ],
            [
                'titulo' => 'The Walking Dead',
                'director' => 'Frank Darabont',
                'ano_lanzamiento' => '2010-01-01',
                'sinopsis' => 'Un grupo de supervivientes liderados por el oficial de policía Rick Grimes luchan por sobrevivir en un mundo dominado por zombies.',
                'portada' => $url . '/portadas/thewalkingdead.jpg',
                'poster' => $url . '/posters/the-walking-dead.jpg',
            ]

        ];


        foreach ($series as $serie) {
            Serie::create($serie);
        }
    }
}
