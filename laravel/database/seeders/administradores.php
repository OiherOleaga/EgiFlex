<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array de datos de administradores
        $administradores = [
            [
                'correo' => 'oiher@gmail.com',
                'contrasena' => bcrypt('contrasena1')
            ],
            [
                'correo' => 'david@gmail.com',
                'contrasena' => bcrypt('contrasena2')
            ],
            [
                'correo' => 'anartz@gmail.com',
                'contrasena' => bcrypt('contrasena3')
            ],
            [
                'correo' => 'markel@gmail.com',
                'contrasena' => bcrypt('contrasena4')
            ],
            [
                'correo' => 'admin5@example.com',
                'contrasena' => bcrypt('contrasena5')
            ],
        ];

        // Insertar los administradores en la base de datos
        foreach ($administradores as $admin) {
            User::create($admin);
        }
    }
}
