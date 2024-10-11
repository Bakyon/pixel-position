<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => '$' . rand(20, 500) . ',000',
            'location' => fake()->randomElement(['Remote', 'In Office', 'Hybrid']),
            'schedule' => fake()->randomElement(['Full time', 'Part time', 'Contract']),
            'url' => fake()->url(),
            'featured' => fake()->randomElement([false, true]),
            'employer_id' => fake()->randomElement([Employer::factory(), 1]),
        ];
    }
}
