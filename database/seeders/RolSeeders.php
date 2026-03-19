<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeders extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'director', 'profesor', 'alumno', 'registrado'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
