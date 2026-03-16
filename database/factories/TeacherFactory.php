<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        $departments = config('departments');
        $department = $departments[array_rand($departments)];

        return [
            "name"       => $this->faker->name(),
            "email"      => $this->faker->unique()->safeEmail(),
            "phone"      => $this->faker->phoneNumber(),
            "department" => $department,
            "course"     => $this->faker->randomElement(['1DAW', '2DAW', '1DAM', '2DAM']),
            "birth_date" => $this->faker->date(),
        ];
    }
}
