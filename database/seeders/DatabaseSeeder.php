<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    if (Employer::count() === 0) {
        Employer::factory(10)->create();
    }

    if (CompanyProfile::count() === 0) {
        Employer::all()->each(function ($employer) {
            CompanyProfile::factory()->create([
                'employer_id' => $employer->id,
                'company_name' => $employer->company_name,
            ]);
        });
    }

    if (Job::count() === 0) {
        Job::factory(50)->create();
    }
}

}
