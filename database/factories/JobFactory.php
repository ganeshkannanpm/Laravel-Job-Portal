<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'salary' => $this->faker->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
            'location' => $this->faker->randomElement([
                $this->faker->city(),
                $this->faker->state(),
                $this->faker->country(),
                'Remote'
            ]),
            'schedule' => 'Full Time',
            'url' => $this->faker->url(),
            'featured' => $this->faker->boolean(20), // 20% chance featured job

            // 🆕 New columns
            'description' => $this->faker->paragraphs(3, true),
            'responsibilities' => implode("\n", $this->faker->sentences(5)),
            'requirements' => implode("\n", $this->faker->sentences(5)),
            'skills_required' => implode(", ", $this->faker->words(6)),
            'about_company' => $this->faker->paragraphs(2, true),
            'posted' => "Posted " . $this->faker->numberBetween(1, 10) . " days ago • 👥 " . $this->faker->numberBetween(1, 50) . " applicants",
        ];
    }
}
