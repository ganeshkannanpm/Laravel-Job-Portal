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
            ->count(20)
            ->state(new Sequence(
                ['featured' => false, 'schedule' => 'Full Time'],
                ['featured' => true, 'schedule' => 'Part Time'],
            ))
            ->create();
    }
}
