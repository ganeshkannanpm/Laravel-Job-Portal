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
            'company'=> $this->faker->company(),
            'schedule' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Internship']),
            'location' => $this->faker->randomElement([
                $this->faker->city(),
                $this->faker->state(),
                $this->faker->country(),
                'Remote'
            ]),
            'experience_level' => $this->faker->randomElement(['Entry', 'Mid', 'Senior', 'Lead']),
            'salary_min' => $this->faker->numberBetween(30000, 70000),
            'salary_max' => $this->faker->numberBetween(70001, 150000),
            'apply_type' => $this->faker->randomElement(['email', 'external']),
            'apply_link' => $this->faker->randomElement([
                $this->faker->email(),
                $this->faker->url()
            ]),
            'description' => $this->faker->paragraphs(3, true),
            'responsibilities' => implode("\n", $this->faker->sentences(5)),
            'requirements' => implode("\n", $this->faker->sentences(5)),
            'skills_required' => json_encode($this->faker->words(5)), // store as JSON array
            'about_company' => implode("\n", $this->faker->sentences(5)),
            'deadline' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'featured' => $this->faker->boolean(20), // 20% chance featured
        ];
    }

}
