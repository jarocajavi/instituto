<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $user = User::create([
            'name'     => 'Admin',
            'username' => 'admin',
            'email'    => 'admin@instituto.es',
            'password' => bcrypt('password'),
            'dni'      => '00000000A',
            'phone'    => '600000001',
            'locale'   => 'es',
        ]);
        $user->assignRole('admin');

        // Director
        $user = User::create([
            'name'     => 'Director',
            'username' => 'director',
            'email'    => 'director@instituto.es',
            'password' => bcrypt('password'),
            'dni'      => '00000001B',
            'phone'    => '600000002',
            'locale'   => 'es',
        ]);
        $user->assignRole('director');

        // Profesores
        $profesores = [
            ['name' => 'Juan García',    'username' => 'jgarcia',  'email' => 'jgarcia@instituto.es',  'dni' => '11111111A'],
            ['name' => 'Ana Ruiz',       'username' => 'aruiz',    'email' => 'aruiz@instituto.es',    'dni' => '22222222B'],
            ['name' => 'Pedro López',    'username' => 'plopez',   'email' => 'plopez@instituto.es',   'dni' => '33333333C'],
            ['name' => 'Carmen Díaz',    'username' => 'cdiaz',    'email' => 'cdiaz@instituto.es',    'dni' => '44444444D'],
        ];

        foreach ($profesores as $p) {
            $user = User::create([
                'name'     => $p['name'],
                'username' => $p['username'],
                'email'    => $p['email'],
                'password' => bcrypt('password'),
                'dni'      => $p['dni'],
                'phone'    => '600000000',
                'locale'   => 'es',
            ]);
            $user->assignRole('profesor');
        }

        // Alumnos
        $alumnos = [
            ['name' => 'Luis Martínez',  'username' => 'lmartinez', 'email' => 'lmartinez@alumno.es', 'dni' => '55555555E'],
            ['name' => 'Sara Pérez',     'username' => 'sperez',    'email' => 'sperez@alumno.es',    'dni' => '66666666F'],
            ['name' => 'Tomás Sánchez',  'username' => 'tsanchez',  'email' => 'tsanchez@alumno.es',  'dni' => '77777777G'],
            ['name' => 'Elena Gómez',    'username' => 'egomez',    'email' => 'egomez@alumno.es',    'dni' => '88888888H'],
        ];

        foreach ($alumnos as $a) {
            $user = User::create([
                'name'     => $a['name'],
                'username' => $a['username'],
                'email'    => $a['email'],
                'password' => bcrypt('password'),
                'dni'      => $a['dni'],
                'phone'    => '611000000',
                'locale'   => 'es',
            ]);
            $user->assignRole('alumno');
        }
    }
}
