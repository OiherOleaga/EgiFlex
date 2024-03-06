<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Temporada;

class TemporadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temporadas = [
            // Temporadas de Dragon ball
            [
                'id_serie' => 4,
                'numero_temporada' => 1,
                'numero_episodios' => 4,
                'fecha_estreno' => '2020-05-01',
            ],
            [
                'id_serie' => 4,
                'numero_temporada' => 2,
                'numero_episodios' => 6,
                'fecha_estreno' => '2021-07-15',
            ],
            // Temporadas de CSM
            [
                'id_serie' => 2,
                'numero_temporada' => 1,
                'numero_episodios' => 3,
                'fecha_estreno' => '2020-05-01',
            ],
            [
                'id_serie' => 2,
                'numero_temporada' => 2,
                'numero_episodios' => 3,
                'fecha_estreno' => '2021-02-15',
            ],
            // Temporadas de Cyberpunk
            [
                'id_serie' => 3,
                'numero_temporada' => 1,
                'numero_episodios' => 4,
                'fecha_estreno' => '2022-05-01',
            ],
            [
                'id_serie' => 3,
                'numero_temporada' => 2,
                'numero_episodios' => 3,
                'fecha_estreno' => '2023-01-15',
            ],
            // Temporada de One Piece
            [
                'id_serie' => 8,
                'numero_temporada' => 1,
                'numero_episodios' => 1095,
                'fecha_estreno' => '2022-05-01',
            ],
            // Temporada de Jujutsu
            [
                'id_serie' => 5,
                'numero_temporada' => 1,
                'numero_episodios' => 5,
                'fecha_estreno' => '2025-05-01',
            ],
            // Temporada de la casa de papel
            [
                'id_serie' => 1,
                'numero_temporada' => 1,
                'numero_episodios' => 1,
                'fecha_estreno' => '2017-05-01',
            ],
            // Temporada de kimetsu no yaiba
            [
                'id_serie' => 6,
                'numero_temporada' => 1,
                'numero_episodios' => 1,
                'fecha_estreno' => '2019-05-01',
            ],
            // Temporada de mashle
            [
                'id_serie' => 7,
                'numero_temporada' => 1,
                'numero_episodios' => 6,
                'fecha_estreno' => '2022-05-01',
            ],
            //Temporada de bleach
            [
                'id_serie' => 11,
                'numero_temporada' => 1,
                'numero_episodios' => 10,
                'fecha_estreno' => '2022-05-01',
            ],

            [
                'id_serie' => 10,
                'numero_temporada' => 1,
                'numero_episodios' => 15,
                'fecha_estreno' => '2022-05-01',
            ],

            //temporada de sololeveling
            [
                'id_serie' => 9,
                'numero_temporada' => 1,
                'numero_episodios' => 8,
                'fecha_estreno' => '2022-05-01',
            ],


        ];

        foreach ($temporadas as $temporada) {
            Temporada::create($temporada);
        }
    }
}
