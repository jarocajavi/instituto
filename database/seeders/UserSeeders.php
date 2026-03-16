<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un admin
        $user = User::create([
            'name' => 'admin',
            'email' => 'a@a.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('admin');
        // Crear 20 teachers
        User::factory()->count(20)->create()->each(function ($user) {
            $user->department = Arr::random(config('departments'));
            $user->save();
            $user->assignRole('teacher');
        });

        // Crear 50 students
        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('student');
        });
        // Crear 50 registered
        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('registered');
        });

        //
    }
}
