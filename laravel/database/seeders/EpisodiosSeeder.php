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
            // Episodios de CSM, temporada 1
            [
                'id_temporada' => 3,
                'titulo' => 'Pochita el demonio',
                'numero_episodio' => 1,
                'duracion' => 20,
                'sinopsis' => 'nuestro protagonista conoce a su amigo de por vida',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/csm01.mp4',
                'portada' => $url . '/portadas/Chainsaw_Man.jpg',
            ],
            [
                'id_temporada' => 3,
                'titulo' => 'Muerte y Vida',
                'numero_episodio' => 2,
                'duracion' => 20,
                'sinopsis' => 'Denji es empujado entre la espada y la pared por aquellos que consideraba amigos',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/csm02.mp4',
                'portada' => $url . '/portadas/Chainsaw_Man.jpg',
            ],
            [
                'id_temporada' => 3,
                'titulo' => 'El resurjir del demonio',
                'numero_episodio' => 3,
                'duracion' => 20,
                'sinopsis' => 'Para sobrevivir se convertira en demonio',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/csm03.mp4',
                'portada' => $url . '/portadas/Chainsaw_Man.jpg',
            ],
            // Episodios de CSM, temporada 2
            [
                'id_temporada' => 4,
                'titulo' => 'Vuelve la motosierra',
                'numero_episodio' => 4,
                'duracion' => 20,
                'sinopsis' => 'Brummmmm bruuumm brrrrr',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/csm04.mp4',
                'portada' => $url . '/portadas/Chainsaw_Man.jpg',
            ],
            [
                'id_temporada' => 4,
                'titulo' => 'El demonio espada',
                'numero_episodio' => 5,
                'duracion' => 20,
                'sinopsis' => 'La pelea entre una motosierra y una espada ¿Quien ganara?',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/csm05.mp4',
                'portada' => $url . '/portadas/Chainsaw_Man.jpg',
            ],
            [
                'id_temporada' => 4,
                'titulo' => 'Makima GOOOOOOOOD',
                'numero_episodio' => 6,
                'duracion' => 20,
                'sinopsis' => 'WOooof woof pisame mommy ñamñam',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/csm06.mp4',
                'portada' => $url . '/portadas/Chainsaw_Man.jpg',
            ],
            // Episodios de cyberpunk, temporada 1
            [
                'id_temporada' => 5,
                'titulo' => 'Codigo vs Maquina',
                'numero_episodio' => 1,
                'duracion' => 20,
                'sinopsis' => 'El prota es bien de pobre asi que se va a drogar con chips pa vengar a su madre',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk01.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            [
                'id_temporada' => 5,
                'titulo' => 'Bipp bip booop bop',
                'numero_episodio' => 2,
                'duracion' => 20,
                'sinopsis' => 'Si se sigue haciendo modificaciones va a terminar como el mosnstruo de frankenstein',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk02.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            [
                'id_temporada' => 5,
                'titulo' => 'Objektibo: teta, Obstucalo: Chips',
                'numero_episodio' => 3,
                'duracion' => 20,
                'sinopsis' => 'Vamos a la torre mas alta dek mundo',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk03.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            [
                'id_temporada' => 5,
                'titulo' => 'Objektibo: teta, Obstucalo: Chips',
                'numero_episodio' => 4,
                'duracion' => 20,
                'sinopsis' => 'Vamos a la torre mas alta dek mundo',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk04.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            // Episodios de cyberpunk, temporada 2
            [
                'id_temporada' => 6,
                'titulo' => 'Codigo alterno',
                'numero_episodio' => 6,
                'duracion' => 20,
                'sinopsis' => 'he soñado que tenia piernas',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk05.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            [
                'id_temporada' => 6,
                'titulo' => 'Maquina 1000',
                'numero_episodio' => 7,
                'duracion' => 20,
                'sinopsis' => 'El fin de una era',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk06.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            [
                'id_temporada' => 6,
                'titulo' => 'AHHHHHHHHH',
                'numero_episodio' => 8,
                'duracion' => 20,
                'sinopsis' => 'AAAAAAAAAAAAAHHHHHHHHHADSKJDHASLDJBASLDJABSDLJBAS',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/cyberpunk07.mp4',
                'portada' => $url . '/portadas/cyberpunk.jpg',
            ],
            // Episodios de One piece
            [
                'id_temporada' => 7,
                'titulo' => 'El ataque de Kazenbo',
                'numero_episodio' => 1058,
                'duracion' => 22,
                'sinopsis' => 'las garras malvadas de Orochi se acercan',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/OP1058.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'Las dificultades de Zoro',
                'numero_episodio' => 1059,
                'duracion' => 21,
                'sinopsis' => ' ¡un monstruo! King la Conflagración',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/OP1059.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => '¡Secretos de Enma!',
                'numero_episodio' => 1060,
                'duracion' => 25,
                'sinopsis' => 'La espada confiada a Zoro y el pues tambien supongo',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/OP1060.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El ataque del diablo',
                'numero_episodio' => 1061,
                'duracion' => 20,
                'sinopsis' => 'Sanji VS Queen y la brigada ninja samurai',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/OP1061.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El ataque del diablo 2',
                'numero_episodio' => 1061.5,
                'duracion' => 21,
                'sinopsis' => 'Sanji VS Queen y la brigada ninja samurai',
                'fecha_estreno' => '2020-05-01',
                'archivo' => $url . '/episodios/OP1061.5.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La revelación de un misterio',
                'numero_episodio' => 1062,
                'duracion' => 23,
                'sinopsis' => 'El pasado de un personaje importante al descubierto',
                'fecha_estreno' => '2020-05-08',
                'archivo' => $url . '/episodios/OP1062.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La batalla en el horizonte',
                'numero_episodio' => 1063,
                'duracion' => 24,
                'sinopsis' => 'Los Piratas del Sombrero de Paja se enfrentan a una nueva amenaza',
                'fecha_estreno' => '2020-05-15',
                'archivo' => $url . '/episodios/OP1063.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El desafío de la isla perdida',
                'numero_episodio' => 1064,
                'duracion' => 22,
                'sinopsis' => 'Una misteriosa isla emerge en el Grand Line',
                'fecha_estreno' => '2020-05-22',
                'archivo' => $url . '/episodios/OP1064.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La conspiración del submundo',
                'numero_episodio' => 1065,
                'duracion' => 23,
                'sinopsis' => 'Los planes de una organización oscura se revelan',
                'fecha_estreno' => '2020-05-29',
                'archivo' => $url . '/episodios/OP1065.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La conspiración del submundo 2',
                'numero_episodio' => 1065.5,
                'duracion' => 21,
                'sinopsis' => 'Los planes de una organización oscura se revelan',
                'fecha_estreno' => '2020-05-29',
                'archivo' => $url . '/episodios/OP1065.5.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El despertar del dragón',
                'numero_episodio' => 1066,
                'duracion' => 25,
                'sinopsis' => 'El poder oculto de un antiguo artefacto se manifiesta',
                'fecha_estreno' => '2020-06-05',
                'archivo' => $url . '/episodios/OP1066.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El destino de los Piratas Supernova',
                'numero_episodio' => 1067,
                'duracion' => 22,
                'sinopsis' => 'Las acciones de otros piratas cambian el curso del viaje',
                'fecha_estreno' => '2020-06-12',
                'archivo' => $url . '/episodios/OP1067.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El legado de los ancestros',
                'numero_episodio' => 1068,
                'duracion' => 24,
                'sinopsis' => 'Un antiguo tesoro revela su conexión con el pasado',
                'fecha_estreno' => '2020-06-19',
                'archivo' => $url . '/episodios/OP1068.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La amenaza del Leviatán',
                'numero_episodio' => 1069,
                'duracion' => 21,
                'sinopsis' => 'Una bestia legendaria emerge de las profundidades',
                'fecha_estreno' => '2020-06-26',
                'archivo' => $url . '/episodios/OP1069.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El enfrentamiento final',
                'numero_episodio' => 1070,
                'duracion' => 22,
                'sinopsis' => 'Los Piratas del Sombrero de Paja se preparan para su batalla más difícil',
                'fecha_estreno' => '2020-07-03',
                'archivo' => $url . '/episodios/OP1070.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El resurgimiento de un viejo enemigo',
                'numero_episodio' => 1071,
                'duracion' => 23,
                'sinopsis' => 'Un enemigo del pasado regresa con un nuevo poder',
                'fecha_estreno' => '2020-07-10',
                'archivo' => $url . '/episodios/OP1071.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La alianza improbable',
                'numero_episodio' => 1072,
                'duracion' => 24,
                'sinopsis' => 'Enemigos se convierten en aliados por una causa común',
                'fecha_estreno' => '2020-07-17',
                'archivo' => $url . '/episodios/OP1072.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El viaje hacia el desconocido',
                'numero_episodio' => 1073,
                'duracion' => 22,
                'sinopsis' => 'Los Piratas del Sombrero de Paja exploran nuevas tierras',
                'fecha_estreno' => '2020-07-24',
                'archivo' => $url . '/episodios/OP1073.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El viaje hacia el desconocido 2',
                'numero_episodio' => 1073.5,
                'duracion' => 19,
                'sinopsis' => 'Los Piratas del Sombrero de Paja exploran nuevas tierras',
                'fecha_estreno' => '2020-07-24',
                'archivo' => $url . '/episodios/OP1073.5.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El renacer de la esperanza',
                'numero_episodio' => 1074,
                'duracion' => 23,
                'sinopsis' => 'Los corazones se unen para enfrentar un desafío imposible',
                'fecha_estreno' => '2020-07-31',
                'archivo' => $url . '/episodios/OP1074.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El precio de la libertad',
                'numero_episodio' => 1075,
                'duracion' => 24,
                'sinopsis' => 'Los sacrificios necesarios para alcanzar la victoria',
                'fecha_estreno' => '2020-08-07',
                'archivo' => $url . '/episodios/OP1075.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El despertar del poder interior',
                'numero_episodio' => 1076,
                'duracion' => 22,
                'sinopsis' => 'Los personajes descubren nuevas habilidades dentro de sí mismos',
                'fecha_estreno' => '2020-08-14',
                'archivo' => $url . '/episodios/OP1076.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La llamada del mar',
                'numero_episodio' => 1077,
                'duracion' => 23,
                'sinopsis' => 'Una aventura marina lleva a los piratas a nuevos horizontes',
                'fecha_estreno' => '2020-08-21',
                'archivo' => $url . '/episodios/OP1077.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El encuentro inesperado',
                'numero_episodio' => 1078,
                'duracion' => 24,
                'sinopsis' => 'Un nuevo personaje se cruza en el camino de los Piratas del Sombrero de Paja',
                'fecha_estreno' => '2020-08-28',
                'archivo' => $url . '/episodios/OP1078.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El giro del destino',
                'numero_episodio' => 1079,
                'duracion' => 25,
                'sinopsis' => 'Los acontecimientos toman un rumbo inesperado para los protagonistas',
                'fecha_estreno' => '2020-09-04',
                'archivo' => $url . '/episodios/OP1079.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El despertar de la tormenta',
                'numero_episodio' => 1080,
                'duracion' => 26,
                'sinopsis' => 'Una nueva amenaza se alza en el horizonte',
                'fecha_estreno' => '2020-09-11',
                'archivo' => $url . '/episodios/OP1080.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El secreto revelado',
                'numero_episodio' => 1081,
                'duracion' => 27,
                'sinopsis' => 'Un antiguo misterio se desvela ante los ojos de los protagonistas',
                'fecha_estreno' => '2020-09-18',
                'archivo' => $url . '/episodios/OP1081.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La prueba de fuego',
                'numero_episodio' => 1082,
                'duracion' => 28,
                'sinopsis' => 'Los héroes se enfrentan a su desafío más peligroso hasta ahora',
                'fecha_estreno' => '2020-09-25',
                'archivo' => $url . '/episodios/OP1082.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El regreso del infierno',
                'numero_episodio' => 1083,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara se enfrentan a un nuevo enemigo',
                'fecha_estreno' => '2020-10-02',
                'archivo' => $url . '/episodios/OP1083.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'Un destino revelado',
                'numero_episodio' => 1084,
                'duracion' => 28,
                'sinopsis' => 'Secretos del pasado salen a la luz',
                'fecha_estreno' => '2020-10-09',
                'archivo' => $url . '/episodios/OP1084.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La batalla definitiva',
                'numero_episodio' => 1085,
                'duracion' => 28,
                'sinopsis' => 'La lucha entre el bien y el mal alcanza su punto álgido',
                'fecha_estreno' => '2020-10-16',
                'archivo' => $url . '/episodios/OP1085.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El contraataque de los Mugiwara',
                'numero_episodio' => 1086,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara preparan su respuesta al ataque enemigo',
                'fecha_estreno' => '2020-10-23',
                'archivo' => $url . '/episodios/OP1086.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El despertar de un nuevo poder',
                'numero_episodio' => 1087,
                'duracion' => 28,
                'sinopsis' => 'Un poder dormido se manifiesta en la batalla',
                'fecha_estreno' => '2020-10-30',
                'archivo' => $url . '/episodios/OP1087.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'La llegada de los aliados',
                'numero_episodio' => 1088,
                'duracion' => 28,
                'sinopsis' => 'Los aliados de los Mugiwara llegan para ayudar en la batalla',
                'fecha_estreno' => '2020-11-06',
                'archivo' => $url . '/episodios/OP1088.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El poder del trabajo en equipo',
                'numero_episodio' => 1089,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara demuestran la fuerza de la amistad y la cooperación',
                'fecha_estreno' => '2020-11-13',
                'archivo' => $url . '/episodios/OP1089.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],

            [
                'id_temporada' => 7,
                'titulo' => 'El enfrentamiento final',
                'numero_episodio' => 1090,
                'duracion' => 28,
                'sinopsis' => 'El enfrentamiento final entre los Mugiwara y sus enemigos',
                'fecha_estreno' => '2020-11-20',
                'archivo' => $url . '/episodios/OP1090.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El renacer de los héroes',
                'numero_episodio' => 1091,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara emergen victoriosos de la batalla',
                'fecha_estreno' => '2020-11-27',
                'archivo' => $url . '/episodios/OP1091.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El nuevo comienzo',
                'numero_episodio' => 1092,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara se preparan para nuevas aventuras',
                'fecha_estreno' => '2020-12-04',
                'archivo' => $url . '/episodios/OP1092.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El descubrimiento del tesoro perdido',
                'numero_episodio' => 1093,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara encuentran un tesoro oculto',
                'fecha_estreno' => '2020-12-11',
                'archivo' => $url . '/episodios/OP1093.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El último viaje',
                'numero_episodio' => 1094,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara se despiden de una gran aventura',
                'fecha_estreno' => '2020-12-18',
                'archivo' => $url . '/episodios/OP1094.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            [
                'id_temporada' => 7,
                'titulo' => 'El regreso a casa',
                'numero_episodio' => 1095,
                'duracion' => 28,
                'sinopsis' => 'Los Mugiwara regresan a casa después de su larga travesía',
                'fecha_estreno' => '2020-12-25',
                'archivo' => $url . '/episodios/OP1095.mp4',
                'portada' => $url . '/portadas/onepiece.jpg',
            ],
            // Episodios de Jujutsu
            [
                'id_temporada' => 8,
                'titulo' => 'Maldicion X Bendicion',
                'numero_episodio' => 1,
                'duracion' => 22,
                'sinopsis' => 'Una terrible maldicion se cierne sobre tokio mientras nadie se da cuenta',
                'fecha_estreno' => '2025-05-01',
                'archivo' => $url . '/episodios/jjk01.mp4',
                'portada' => $url . '/portadas/JJK.jpg',
            ],
            [
                'id_temporada' => 8,
                'titulo' => 'Itadori Yuuji',
                'numero_episodio' => 2,
                'duracion' => 19,
                'sinopsis' => 'Yuji se encuentra con poderosos aliados que le acompañaran en sus peleas',
                'fecha_estreno' => '2025-05-02',
                'archivo' => $url . '/episodios/jjk02.mp4',
                'portada' => $url . '/portadas/JJK.jpg',
            ],
            [
                'id_temporada' => 8,
                'titulo' => 'Fushiguro Megumi',
                'numero_episodio' => 3,
                'duracion' => 22,
                'sinopsis' => 'Todos los candidatos a absorber la maldicion se posan en el campo de batalla',
                'fecha_estreno' => '2025-05-03',
                'archivo' => $url . '/episodios/jjk03.mp4',
                'portada' => $url . '/portadas/JJK.jpg',
            ],
            [
                'id_temporada' => 8,
                'titulo' => 'Modificacion del juego',
                'numero_episodio' => 4,
                'duracion' => 20,
                'sinopsis' => 'Las reglas cambian a medida que nuestros heroes avanzan',
                'fecha_estreno' => '2025-05-06',
                'archivo' => $url . '/episodios/jjk04.mp4',
                'portada' => $url . '/portadas/JJK.jpg',
            ],
            [
                'id_temporada' => 8,
                'titulo' => 'Los dedos de sukuna',
                'numero_episodio' => 5,
                'duracion' => 25,
                'sinopsis' => 'Sukuna tiene... muchos dedos, y brazos, y manos...',
                'fecha_estreno' => '2025-06-01',
                'archivo' => $url . '/episodios/jjk05.mp4',
                'portada' => $url . '/portadas/JJK.jpg',
            ],
            // Episodios de la casa de papel
            [
                'id_temporada' => 9,
                'titulo' => 'Empieza el atraco',
                'numero_episodio' => 1,
                'duracion' => 22,
                'sinopsis' => 'El profesor reune a un grupo de ladrones para el mayor robo jamas visto',
                'fecha_estreno' => '2017-05-01',
                'archivo' => $url . '/episodios/lcdp_01.mp4',
                'portada' => $url . '/portadas/casapapel.jpg',
            ],
            // Episodios de kny
            [
                'id_temporada' => 10,
                'titulo' => 'これは日本語のタイトルです',
                'numero_episodio' => 1,
                'duracion' => 25,
                'sinopsis' => 'なぜこれを翻訳するのですか？センスがない',
                'fecha_estreno' => '2019-05-01',
                'archivo' => $url . '/episodios/kny_01.mp4',
                'portada' => $url . '/portadas/kimetsu.jpg',
            ],
            // Episodios de mashle
            [
                'id_temporada' => 11,
                'titulo' => 'El Chico sin Magia',
                'numero_episodio' => 1,
                'duracion' => 21,
                'sinopsis' => ' un chico que vive en un mundo lleno de magia, descubre que él es el único sin poderes mágicos',
                'fecha_estreno' => '2022-05-01',
                'archivo' => $url . '/episodios/mashle_01.mp4',
                'portada' => $url . '/portadas/mashel.jpg',
            ],
            [
                'id_temporada' => 11,
                'titulo' => 'El Desafío del Duelo Mágico',
                'numero_episodio' => 2,
                'duracion' => 17,
                'sinopsis' => 'A pesar de no tener magia, Mashle acepta el desafío y se prepara para enfrentar al estudiante usando solo su fuerza bruta',
                'fecha_estreno' => '2022-05-01',
                'archivo' => $url . '/episodios/mashle_02.mp4',
                'portada' => $url . '/portadas/mashel.jpg',
            ],
            [
                'id_temporada' => 11,
                'titulo' => 'La Prueba del Laberinto Mágico',
                'numero_episodio' => 2,
                'duracion' => 23,
                'sinopsis' => 'La escuela de magia organiza una prueba en un laberinto mágico donde los estudiantes deben superar diversos obstáculos utilizando sus habilidades mágicas',
                'fecha_estreno' => '2022-05-01',
                'archivo' => $url . '/episodios/mashle_03.mp4',
                'portada' => $url . '/portadas/mashel.jpg',
            ],
            [
                'id_temporada' => 11,
                'titulo' => 'El Secreto de Mashle Revelado',
                'numero_episodio' => 4,
                'duracion' => 23,
                'sinopsis' => 'Los compañeros de Mashle descubren su falta de habilidades mágicas y lo confrontan sobre su origen',
                'fecha_estreno' => '2022-05-01',
                'archivo' => $url . '/episodios/mashle_04.mp4',
                'portada' => $url . '/portadas/mashel.jpg',
            ],
            [
                'id_temporada' => 11,
                'titulo' => 'La Competencia de las Olimpiadas Mágicas',
                'numero_episodio' => 5,
                'duracion' => 20,
                'sinopsis' => 'La escuela organiza una competencia de las Olimpiadas Mágicas donde los estudiantes compiten en diversas pruebas que ponen a prueba sus habilidades mágicas. ',
                'fecha_estreno' => '2022-05-01',
                'archivo' => $url . '/episodios/mashle_05.mp4',
                'portada' => $url . '/portadas/mashel.jpg',
            ],
            [
                'id_temporada' => 11,
                'titulo' => 'La Batalla en el Torneo de Magia',
                'numero_episodio' => 6,
                'duracion' => 21,
                'sinopsis' => 'Mashle decide participar en un torneo de magia para demostrar que la fuerza física también puede ser poderosa en un mundo dominado por la magia.',
                'fecha_estreno' => '2022-05-01',
                'archivo' => $url . '/episodios/mashle_06.mp4',
                'portada' => $url . '/portadas/mashel.jpg',
            ],
            
        ];

        foreach ($episodios as $episodio) {
            Episodio::create($episodio);
        }
    }
}
