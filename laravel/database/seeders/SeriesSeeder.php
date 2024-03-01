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
            ],
            [
                'titulo' => 'La Reina Carlota',
                'director' => 'Nombre del director (si está disponible)',
                'ano_lanzamiento' => '1010-02-12',
                'sinopsis' => 'Breve descripción de la trama de la serie.',
                'portada' => $url . '/portadas/reina_carlota.jpg',
                'poster' => $url . '/posters/reina_carlota.jpg',
            ],
            [
                'titulo' => 'Destino: La Saga Winx',
                'director' => 'Brian Young',
                'ano_lanzamiento' => '2021-01-22',
                'sinopsis' => 'La serie sigue a un grupo de jóvenes hadas que asisten a Alfea, una escuela para hadas en el Otro Mundo. Mientras aprenden a controlar sus poderes, descubren secretos oscuros y enfrentan amenazas peligrosas.',
                'portada' => $url . '/portadas/destino_saga_winx.jpg',
                'poster' => $url . '/posters/destino_saga_winx.jpg',
            ],
            [
                'titulo' => 'La Chica de la Nieve',
                'director' => 'Nombre del director (si está disponible)',
                'ano_lanzamiento' => '2020-03-12',
                'sinopsis' => 'Breve descripción de la trama de la serie.',
                'portada' => $url . '/portadas/chica_nieve.jpg',
                'poster' => $url . '/posters/chica_nieve.jpg',
            ],
            [
                'titulo' => 'Mi Vida con los Chicos Walter',
                'director' => 'Nombre del director (si está disponible)',
                'ano_lanzamiento' => '1994-09-22',
                'sinopsis' => 'Breve descripción de la trama de la serie.',
                'portada' => $url . '/portadas/mi_vida_con_los_chicos_walter.jpg',
                'poster' => $url . '/posters/mi_vida_con_los_chicos_walter.jpg',
            ],

            [
                'titulo' => 'Friends',
                'director' => 'Kevin S. Bright, Marta Kauffman, David Crane',
                'ano_lanzamiento' => '1994-09-22',
                'sinopsis' => 'Se centra en un grupo de seis amigos que viven en Manhattan y afrontan juntos los altibajos de la vida y el amor.',
                'portada' => $url . '/portadas/friends.jpg',
                'poster' => $url . '/posters/friends.jpg',
            ],
            [
                'titulo' => 'Breaking Bad',
                'director' => 'Vince Gilligan',
                'ano_lanzamiento' => '2008-01-20',
                'sinopsis' => 'Un profesor de química con cáncer terminal se convierte en un fabricante de metanfetamina para asegurar el futuro financiero de su familia.',
                'portada' => $url . '/portadas/breaking_bad.jpg',
                'poster' => $url . '/posters/breaking_bad.jpg',
            ],
            [
                'titulo' => 'The Crown',
                'director' => 'Peter Morgan',
                'ano_lanzamiento' => '2016-11-04',
                'sinopsis' => 'Una mirada a la vida de la Reina Isabel II y los acontecimientos que han definido la segunda mitad del siglo XX.',
                'portada' => $url . '/portadas/the_crown.jpg',
                'poster' => $url . '/posters/the_crown.jpg',
            ],
            [
                'titulo' => 'Black Mirror',
                'director' => 'Charlie Brooker',
                'ano_lanzamiento' => '2011-12-04',
                'sinopsis' => 'Una serie de antología que explora un futuro distópico y la relación entre la tecnología y la sociedad humana.',
                'portada' => $url . '/portadas/black_mirror.jpg',
                'poster' => $url . '/posters/black_mirror.jpg',
            ],
            [
                'titulo' => 'The Mandalorian',
                'director' => 'Jon Favreau',
                'ano_lanzamiento' => '2019-11-12',
                'sinopsis' => 'Un pistolero solitario viaja por la galaxia mucho después de la caída del Imperio Galáctico y antes de la aparición de la Primera Orden.',
                'portada' => $url . '/portadas/the_mandalorian.jpg',
                'poster' => $url . '/posters/the_mandalorian.jpg',
            ],
            [
                'titulo' => 'Narcos',
                'director' => 'Chris Brancato, Carlo Bernard, Doug Miro',
                'ano_lanzamiento' => '2015-08-28',
                'sinopsis' => 'Una crónica de la vida y el ascenso al poder del narcotraficante Pablo Escobar y los cárteles de la droga en Colombia.',
                'portada' => $url . '/portadas/narcos.jpg',
                'poster' => $url . '/posters/narcos.jpg',
            ],
            [
                'titulo' => 'Game of Thrones',
                'director' => 'David Benioff, D. B. Weiss',
                'ano_lanzamiento' => '2011-04-17',
                'sinopsis' => 'Una historia de traición, nobleza, lucha por el poder y dragones, ambientada en los Siete Reinos de Westeros.',
                'portada' => $url . '/portadas/game_of_thrones.jpg',
                'poster' => $url . '/posters/game_of_thrones.jpg',
            ],
            [
                'titulo' => 'The Witcher',
                'director' => 'Lauren Schmidt Hissrich',
                'ano_lanzamiento' => '2019-12-20',
                'sinopsis' => 'Basada en las novelas de fantasía, sigue al cazador de monstruos Geralt de Rivia en su búsqueda de su destino en un mundo lleno de peligros.',
                'portada' => $url . '/portadas/the_witcher.jpg',
                'poster' => $url . '/posters/the_witcher.jpg',
            ],
            [
                'titulo' => 'Vikings',
                'director' => 'Michael Hirst',
                'ano_lanzamiento' => '2013-03-03',
                'sinopsis' => 'Sigue las aventuras de Ragnar Lothbrok, un legendario guerrero vikingo, mientras explora y saquea territorios lejanos.',
                'portada' => $url . '/portadas/vikings.jpg',
                'poster' => $url . '/posters/vikings.jpg',
            ],

        ];


        foreach ($series as $serie) {
            Serie::create($serie);
        }
    }
}
