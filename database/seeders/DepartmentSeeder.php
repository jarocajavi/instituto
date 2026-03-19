<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Informática', 'code' => 'INF', 'description' => 'Departamento de Informática y Comunicaciones'],
            ['name' => 'Matemáticas', 'code' => 'MAT', 'description' => 'Departamento de Matemáticas'],
            ['name' => 'Lengua', 'code' => 'LEN', 'description' => 'Departamento de Lengua y Literatura'],
            ['name' => 'Inglés', 'code' => 'ING', 'description' => 'Departamento de Inglés'],
            ['name' => 'Ciencias', 'code' => 'CIE', 'description' => 'Departamento de Ciencias Naturales'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
