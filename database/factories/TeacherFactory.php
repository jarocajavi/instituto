<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'          => fake('es_ES')->firstName(),
            'surname'       => fake('es_ES')->lastName() . ' ' . fake('es_ES')->lastName(),
            'email'         => fake()->unique()->safeEmail(),
            'phone'         => '6' . fake()->numerify('########'),
            'department_id' => Department::inRandomOrder()->first()?->id,
        ];
    }
}
