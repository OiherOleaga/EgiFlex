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
                'contrasena' => hash('sha256', '12345'),
                'nombre' => 'Oiher',
                'apellido' => 'Perro'
            ],
            [
                'correo' => 'david@ikasle.egibide.org',
                'estado' => 'activo',
                'contrasena' => hash('sha256', '12345'),
                'nombre' => 'david',
                'apellido' => 'Moreno'
            ],
            [
                'correo' => 'anartz@ikasle.egibide.org',
                'estado' => 'activo',
                'contrasena' => hash('sha256', '12345'),
                'nombre' => 'anartz',
                'apellido' => 'pato'
            ],
            [
                'correo' => 'markel@ikasle.egibide.org',
                'estado' => 'activo',
                'contrasena' => hash('sha256', '12345'),
                'nombre' => 'Markel',
                'apellido' => 'Guapo'
            ],
            [
                'correo' => 'cliente5@example.com',
                'estado' => 'inactivo',
                'contrasena' => hash('sha256', 'contrasena5'),
                'nombre' => 'Pedro',
                'apellido' => 'Sanchez'
            ],
        ];

        // Insertar los clientes en la base de datos
        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
