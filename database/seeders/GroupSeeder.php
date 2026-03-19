<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            ['name' => '1º DAW',  'code' => '1DAW', 'course' => '2024-2025'],
            ['name' => '2º DAW',  'code' => '2DAW', 'course' => '2024-2025'],
            ['name' => '1º DAM',  'code' => '1DAM', 'course' => '2024-2025'],
            ['name' => '2º DAM',  'code' => '2DAM', 'course' => '2024-2025'],
        ];

        foreach ($groups as $g) {
            Group::create($g);
        }

        // Asignar alumnos a grupos
        $daw1 = Group::where('code', '1DAW')->first();
        $daw2 = Group::where('code', '2DAW')->first();
        $dam1 = Group::where('code', '1DAM')->first();
        $dam2 = Group::where('code', '2DAM')->first();

        $students = Student::all();

        $daw1->students()->attach($students->slice(0, 3)->pluck('id'));
        $daw2->students()->attach($students->slice(3, 3)->pluck('id'));
        $dam1->students()->attach($students->slice(6, 3)->pluck('id'));
        $dam2->students()->attach($students->slice(9, 3)->pluck('id'));
    }
}
