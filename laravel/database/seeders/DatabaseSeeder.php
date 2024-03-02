<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Peliculasseeder::class);
        $this->call(SeriesSeeder::class);

        User::create([
            'name' => 'David',
            'email' => 'david.moreno@ikasle.egibide.org',
            'password' => hash('sha256', 'contrasena')
        ]);

        User::create([
            'name' => 'Markel',
            'email' => 'markel.onaindia@ikasle.egibide.org',
            'password' => hash('sha256', 'contrasena')
        ]);

        User::create([
            'name' => 'Oiher',
            'email' => 'oiher.oleaga@ikasle.egibide.org',
            'password' => hash('sha256', 'contrasena')
        ]);

        User::create([
            'name' => 'Anartz',
            'email' => 'anartz.pagaldai@ikasle.egibide.org',
            'password' => hash('sha256', 'contrasena')
        ]);

        Cliente::create([
            'correo' => 'oiher@ikasle.egibide.org',
            'estado' => 'activo',
            'contrasena' => hash('sha256', '12345'),
            'nombre' => 'Oiher',
            'apellido' => 'Oleaga'
        ]);

        Cliente::create([
            'correo' => 'david@ikasle.egibide.org',
            'estado' => 'activo',
            'contrasena' => hash('sha256', '12345'),
            'nombre' => 'david',
            'apellido' => 'Moreno'
        ]);

        Cliente::create([
            'correo' => 'anartz@ikasle.egibide.org',
            'estado' => 'activo',
            'contrasena' => hash('sha256', '12345'),
            'nombre' => 'anartz',
            'apellido' => 'pato'
        ]);

        Cliente::create([
            'correo' => 'markel@ikasle.egibide.org',
            'estado' => 'activo',
            'contrasena' => hash('sha256', '12345'),
            'nombre' => 'Markel',
            'apellido' => 'trans'
        ]);

        Cliente::create([
            'correo' => 'cliente5@example.com',
            'estado' => 'inactivo',
            'contrasena' => hash('sha256', 'contrasena5'),
            'nombre' => 'Pedro',
            'apellido' => 'López'
        ]);
    }
}
