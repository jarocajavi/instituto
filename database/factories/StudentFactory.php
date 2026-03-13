<?php
namespace Database\Factories;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'phone'      => $this->faker->phoneNumber(),
            'course'     => $this->faker->randomElement(['DAW', 'DAM', 'ASIR', 'SMR']),
            'birth_date' => $this->faker->dateTimeBetween('-30 years', '-16 years')->format('Y-m-d'),
        ];
    }
}
