<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array de datos de clientes
        $clientes = [
            [
                'correo' => 'oiher@ikasle.egibide.org',
                'estado' => 'activo',
<<<<<<< HEAD
                'contrasena' => hash('sha256', '12345'),
=======
                'contrasena' => hash('sha256','12345'),
>>>>>>> e99166cce20c10aae1ab66c902415c66785649ed
                'nombre' => 'Oiher',
                'apellido' => 'Perro'
            ],
            [
                'correo' => 'david@ikasle.egibide.org',
                'estado' => 'activo',
<<<<<<< HEAD
                'contrasena' => hash('sha256', '12345'),
=======
                'contrasena' => hash('sha256','12345'),
>>>>>>> e99166cce20c10aae1ab66c902415c66785649ed
                'nombre' => 'david',
                'apellido' => 'Moreno'
            ],
            [
                'correo' => 'anartz@ikasle.egibide.org',
                'estado' => 'activo',
<<<<<<< HEAD
                'contrasena' => hash('sha256', '12345'),
=======
                'contrasena' => hash('sha256','12345'),
>>>>>>> e99166cce20c10aae1ab66c902415c66785649ed
                'nombre' => 'anartz',
                'apellido' => 'pato'
            ],
            [
                'correo' => 'markel@ikasle.egibide.org',
                'estado' => 'activo',
<<<<<<< HEAD
                'contrasena' => hash('sha256', '12345'),
=======
                'contrasena' => hash('sha256','12345'),
>>>>>>> e99166cce20c10aae1ab66c902415c66785649ed
                'nombre' => 'Markel',
                'apellido' => 'Guapo'
            ],
            [
                'correo' => 'cliente5@example.com',
                'estado' => 'inactivo',
<<<<<<< HEAD
                'contrasena' => hash('sha256', 'contrasena5'),
=======
                'contrasena' => hash('sha256','12345'),
>>>>>>> e99166cce20c10aae1ab66c902415c66785649ed
                'nombre' => 'Pedro',
                'apellido' => 'López'
            ],
        ];

        // Insertar los clientes en la base de datos
        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
