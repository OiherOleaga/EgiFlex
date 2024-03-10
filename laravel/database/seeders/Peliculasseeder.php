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
        $url = "http://admin.egiflex.es/media";
        $peliculas = [
            [
                'titulo' => 'Barbie',
                'director' => 'Director de Barbie',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Después de ser expulsada de Barbieland por no ser una muñeca de aspecto perfecto, Barbie parte hacia el mundo humano para encontrar la verdadera felicidad.',
                'duracion' => 12,
                'archivo' => $url . '/peliculas/barbie.mp4',
                'portada' => $url . '/portadas/barbie.jpg',
                'poster' => $url . '/posters/barbie.jpg',
            ],
            [
                'titulo' => 'Oppenheimer',
                'director' => 'Director de Oppenheimer',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Durante la Segunda Guerra Mundial, el teniente general Leslie Groves designa al físico J. Robert Oppenheimer para un grupo de trabajo que está desarrollando el Proyecto Manhattan',
                'duracion' => 34,
                'archivo' => $url . '/peliculas/oppenheimer.mp4',
                'portada' => $url . '/portadas/oppen.jpg',
                'poster' =>  $url . '/posters/oppenheimer.jpg',
            ],
            [
                'titulo' => 'The Suicide Squad',
                'director' => 'James Gunn',
                'ano_lanzamiento' => '2021-01-01',
                'sinopsis' => 'El gobierno envía a los supervillanos más peligrosos del mundo a la remota isla de Corto Maltés, atestada de enemigos. Armados con armas de alta tecnología',
                'duracion' => 116,
                'archivo' => $url . '/peliculas/suicide_squad.mp4',
                'portada' => $url . '/portadas/El_Escuadraon_Suicida.jpg',
                'poster' => $url . '/posters/the-suicide-squad.jpg',
            ],
            [
                'titulo' => 'Wonka',
                'director' => 'Paul King',
                'ano_lanzamiento' => '2020-01-01',
                'sinopsis' => 'Armado únicamente con muchos sueños y ganas de aventura, el joven chocolatero Willy Wonka conoce a los oompa-loompas y se dispone a cambiar el mundo.',
                'duracion' => 23,
                'archivo' => $url  . '/peliculas/wonka.mp4',
                'portada' => $url . '/portadas/Wonka.jpg',
                'poster' => $url . '/posters/wonka.jpg',
            ],
            [
                'titulo' => 'Iron Man',
                'director' => 'Jon Favreau',
                'ano_lanzamiento' => '2008-04-30',
                'sinopsis' => 'Tony Stark, un industrial multimillonario y genio inventor, es secuestrado por terroristas en Afganistán. Para escapar, construye un traje blindado y decide utilizar su tecnología para combatir el crimen y proteger al mundo como Iron Man.',
                'duracion' => 126,
                'archivo' => $url . '/peliculas/ironman1.mp4',
                'portada' => $url . '/portadas/ironman1.jpg',
                'poster' => $url . '/posters/ironman1.jpg',
            ],

            [
                'titulo' => 'Insurgente',
                'director' => 'Robert Schwentke',
                'ano_lanzamiento' => '2015-03-20',
                'sinopsis' => 'En un mundo distópico, Tris Prior busca respuestas y aliados mientras se enfrenta a las crecientes amenazas del régimen autoritario que controla su sociedad. En medio de la guerra, descubre la importancia de la lealtad y el sacrificio.',
                'duracion' => 119,
                'archivo' => $url . '/peliculas/insurgente.avi',
                'portada' => $url . '/portadas/insurgente.jpg',
                'poster' => $url . '/posters/insurgente.jpg',
            ],

            [
                'titulo' => 'Dune',
                'director' => 'Denis Villeneuve',
                'ano_lanzamiento' => '2021-10-22',
                'sinopsis' => 'En un futuro lejano, el joven Paul Atreides acepta el control del desierto de Arrakis, también conocido como Dune',
                'duracion' => 155,
                'archivo' => $url . '/peliculas/dune.mp4',
                'portada' => $url . '/portadas/dune.jpg',
                'poster' => $url . '/posters/dune.jpg',
            ],
            [
                'titulo' => 'It',
                'director' => 'Andy Muschietti',
                'ano_lanzamiento' => '2017-09-08',
                'sinopsis' => 'Un grupo de niños se enfrenta a sus mayores miedos cuando se enfrentan a un malvado payaso llamado Pennywise, cuyos orígenes se remontan a siglos atrás.',
                'duracion' => 135,
                'archivo' => $url . '/peliculas/it.mp4',
                'portada' => $url . '/portadas/it.jpg',
                'poster' => $url . '/posters/it.jpg',
            ],
            [
                'titulo' => 'Inception',
                'director' => 'Christopher Nolan',
                'ano_lanzamiento' => '2010-07-16',
                'sinopsis' => 'Un ladrón con habilidades extraordinarias se introduce en el mundo del espionaje corporativo para implantar una idea en la mente de un CEO.',
                'duracion' => 148,
                'archivo' => $url . '/peliculas/inception.mp4',
                'portada' => $url . '/portadas/inception.jpg',
                'poster' => $url . '/posters/inception.jpg',
            ],
            [
                'titulo' => 'The Matrix',
                'director' => 'The Wachowskis',
                'ano_lanzamiento' => '1999-03-31',
                'sinopsis' => 'Un hacker descubre la verdad sobre su realidad y su papel en la lucha contra las máquinas que dominan la humanidad en un mundo virtual.',
                'duracion' => 136,
                'archivo' => $url . '/peliculas/the_matrix.mp4',
                'portada' => $url . '/portadas/the_matrix.jpg',
                'poster' => $url . '/posters/the_matrix.jpg',
            ],
            [
                'titulo' => 'Interstellar',
                'director' => 'Christopher Nolan',
                'ano_lanzamiento' => '2014-11-07',
                'sinopsis' => 'Un grupo de exploradores viaja a través de un agujero de gusano en busca de un nuevo hogar para la humanidad después de que la Tierra se vuelva inhabitable.',
                'duracion' => 169,
                'archivo' => $url . '/peliculas/interstellar.mp4',
                'portada' => $url . '/portadas/interstellar.jpg',
                'poster' => $url . '/posters/interstellar.jpg',
            ],
            [
                'titulo' => 'The Dark Knight',
                'director' => 'Christopher Nolan',
                'ano_lanzamiento' => '2008-07-18',
                'sinopsis' => 'Batman se enfrenta a su enemigo más grande, el Joker, quien siembra el caos y el terror en Gotham City.',
                'duracion' => 152,
                'archivo' => $url . '/peliculas/batman.mp4',
                'portada' => $url . '/portadas/the_dark_knight.jpg',
                'poster' => $url . '/posters/the_dark_knight.jpg',
            ],
            [
                'titulo' => 'Fight Club',
                'director' => 'David Fincher',
                'ano_lanzamiento' => '1999-10-15',
                'sinopsis' => 'Un hombre desilusionado y un vendedor de jabón insomne forman un club de lucha clandestino que se convierte en un movimiento subversivo.',
                'duracion' => 139,
                'archivo' => $url . '/peliculas/fight_club.mp4',
                'portada' => $url . '/portadas/fight_club.jpg',
                'poster' => $url . '/posters/fight_club.jpg',
            ],
            [
                'titulo' => 'Pulp Fiction',
                'director' => 'Quentin Tarantino',
                'ano_lanzamiento' => '1994-10-14',
                'sinopsis' => 'Varias historias entrelazadas que se centran en dos gánsteres, su jefe, la esposa de un gánster y un boxeador.',
                'duracion' => 154,
                'archivo' => $url . '/peliculas/verdaderaspesadillas.mp4',
                'portada' => $url . '/portadas/pulp_fiction.jpg',
                'poster' => $url . '/posters/pulp_fiction.jpg',
            ],
            [
                'titulo' => 'The Shawshank Redemption',
                'director' => 'Frank Darabont',
                'ano_lanzamiento' => '1994-09-23',
                'sinopsis' => 'Un banquero es condenado por un crimen que no cometió y se hace amigo de un prisionero experimentado mientras lucha por demostrar su inocencia y sobrevivir en la cárcel.',
                'duracion' => 142,
                'archivo' => $url . '/peliculas/pesadillaelmstreet.mp4',
                'portada' => $url . '/portadas/the_shawshank_redemption.jpg',
                'poster' => $url . '/posters/the_shawshank_redemption.jpg',
            ],
            [
                'titulo' => 'Forrest Gump',
                'director' => 'Robert Zemeckis',
                'ano_lanzamiento' => '1994-07-06',
                'sinopsis' => 'La vida de Forrest Gump, desde su infancia hasta la adultez, mientras vive una serie de eventos históricos poco comunes.',
                'duracion' => 142,
                'archivo' => $url . '/peliculas/forrestgump.mp4',
                'portada' => $url . '/portadas/forrest_gump.jpg',
                'poster' => $url . '/posters/forrest_gump.jpg',
            ],
            [
                'titulo' => 'The Godfather',
                'director' => 'Francis Ford Coppola',
                'ano_lanzamiento' => '1972-03-24',
                'sinopsis' => 'La historia de la familia Corleone, una poderosa dinastía criminal, mientras el patriarca transfiere el control de su imperio a su hijo más joven.',
                'duracion' => 175,
                'archivo' => $url . '/peliculas/the_godfather.mp4',
                'portada' => $url . '/portadas/the_godfather.jpg',
                'poster' => $url . '/posters/the_godfather.jpg',
            ],
            [
                'titulo' => 'The Lord of the Rings: The Fellowship of the Ring',
                'director' => 'Peter Jackson',
                'ano_lanzamiento' => '2001-12-19',
                'sinopsis' => 'Un joven hobbit, Frodo Bolsón, comienza un viaje épico para destruir un anillo mágico y evitar que caiga en manos del Señor Oscuro Sauron.',
                'duracion' => 178,
                'archivo' => $url . '/peliculas/the_lord_of_the_rings_the_fellowship_of_the_ring.mp4',
                'portada' => $url . '/portadas/the_lord_of_the_rings_the_fellowship_of_the_ring.jpg',
                'poster' => $url . '/posters/the_lord_of_the_rings_the_fellowship_of_the_ring.jpg',
            ],
            [
                'titulo' => 'Crepúsculo',
                'director' => 'Catherine Hardwicke',
                'ano_lanzamiento' => '2008-11-21',
                'sinopsis' => 'Una joven llamada Bella Swan se muda a Forks, Washington, donde se enamora de Edward Cullen, un vampiro que oculta su verdadera naturaleza.',
                'duracion' => 122,
                'archivo' => $url . '/peliculas/crepusculo.mp4',
                'portada' => $url . '/portadas/crepusculo.jpg',
                'poster' => $url . '/posters/crepusculo.jpg',
            ],

        ];



        // Insertar las películas en la base de datos
        foreach ($peliculas as $pelicula) {
            Pelicula::create($pelicula);
        }
    }
}
