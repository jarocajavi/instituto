<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RolSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'teacher',
        ]);
        Role::create([
            'name' => 'student',
        ]);
        Role::create([
            'name' => 'registered',
        ]);

        //Creo los roles
    }
}
