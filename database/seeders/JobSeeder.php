<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        Job::factory()
            ->count(10)
            ->state(new Sequence(
                [
                    'featured' => false,
                    'schedule' => 'Full-time',
                    'experience_level' => 'Entry',
                ],
                [
                    'featured' => true,
                    'schedule' => 'Part-time',
                    'experience_level' => 'Mid',
                ],
                [
                    'featured' => false,
                    'schedule' => 'Contract',
                    'experience_level' => 'Senior',
                ],
                [
                    'featured' => true,
                    'schedule' => 'Internship',
                    'experience_level' => 'Entry',
                ]
            ))
            ->create();
    }
}
