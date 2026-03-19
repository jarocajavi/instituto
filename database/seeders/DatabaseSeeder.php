<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolSeeders::class,
            UserSeeder::class,
            DepartmentSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            GroupSeeder::class,
            SubjectSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
