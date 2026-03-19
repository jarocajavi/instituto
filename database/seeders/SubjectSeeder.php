<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Group;
use App\Models\Department;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $inf = Department::where('code', 'INF')->first();
        $mat = Department::where('code', 'MAT')->first();

        $subjects = [
            ['name' => 'Programación',              'code' => 'PROG',  'department_id' => $inf->id, 'description' => 'Fundamentos de programación'],
            ['name' => 'Bases de Datos',            'code' => 'BBDD',  'department_id' => $inf->id, 'description' => 'Diseño y gestión de bases de datos'],
            ['name' => 'Desarrollo Web',            'code' => 'DWEB',  'department_id' => $inf->id, 'description' => 'Desarrollo de aplicaciones web'],
            ['name' => 'Sistemas Informáticos',     'code' => 'SINF',  'department_id' => $inf->id, 'description' => 'Administración de sistemas'],
            ['name' => 'Matemáticas Aplicadas',     'code' => 'MAPA',  'department_id' => $mat->id, 'description' => 'Matemáticas para informática'],
        ];

        foreach ($subjects as $s) {
            $subject = Subject::create($s);
        }

        // Asignar asignaturas a grupos
        $daw1 = Group::where('code', '1DAW')->first();
        $daw2 = Group::where('code', '2DAW')->first();

        $prog = Subject::where('code', 'PROG')->first();
        $bbdd = Subject::where('code', 'BBDD')->first();
        $dweb = Subject::where('code', 'DWEB')->first();

        $daw1->subjects()->attach([$prog->id, $bbdd->id]);
        $daw2->subjects()->attach([$bbdd->id, $dweb->id]);
    }
}
