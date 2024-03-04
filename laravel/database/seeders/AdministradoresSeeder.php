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
                'name' => 'Oiher',
                'email' => 'oiher@gmail.com',
                'password' => bcrypt('contrasena1')
            ],
            [
                'name' => 'David',
                'email' => 'david@gmail.com',
                'password' => bcrypt('contrasena2')
            ],
            [
                'name' => 'Anartz',
                'email' => 'anartz@gmail.com',
                'password' => bcrypt('contrasena3')
            ],
            [
                'name' => 'Markel',
                'email' => 'markel@gmail.com',
                'password' => bcrypt('contrasena4')
            ],
            [
                'name' => 'Admin',
                'email' => 'admin5@example.com',
                'password' => bcrypt('contrasena5')
            ],
        ];
    
        // Insertar los administradores en la base de datos
        foreach ($administradores as $admin) {
            User::create($admin);
        }
    }
}
