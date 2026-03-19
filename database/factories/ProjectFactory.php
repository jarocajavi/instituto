<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => fake('es_ES')->sentence(4, true),
            'description' => fake('es_ES')->paragraph(2),
            'hours'       => fake()->numberBetween(40, 200),
            'start_date'  => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}
