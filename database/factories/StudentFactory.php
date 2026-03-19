<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => fake('es_ES')->firstName(),
            'surname'    => fake('es_ES')->lastName() . ' ' . fake('es_ES')->lastName(),
            'email'      => fake()->unique()->safeEmail(),
            'phone'      => '6' . fake()->numerify('########'),
            'birth_date' => fake()->dateTimeBetween('-22 years', '-16 years')->format('Y-m-d'),
        ];
    }
}
