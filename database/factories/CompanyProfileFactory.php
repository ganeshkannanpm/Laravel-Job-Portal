<?php

namespace Database\Factories;

use App\Models\CompanyProfile;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyProfileFactory extends Factory
{
    protected $model = CompanyProfile::class;

    public function definition(): array
    {
    
        $industries = [
            'IT Services',
            'Software Development',
            'Finance',
            'E-commerce',
            'Healthcare',
            'Telecommunications',
            'Cloud Computing',
        ];

        $companySizes = [
            '1–10 employees',
            '11–50 employees',
            '51–200 employees',
            '201–500 employees',
            '500+ employees',
        ];

        $addresses = [
            'Electronic City, Bangalore, Karnataka',
            'T Nagar, Chennai, Tamil Nadu',
            'HITEC City, Hyderabad, Telangana',
            'Hinjewadi, Pune, Maharashtra',
            'Sector 62, Noida, Uttar Pradesh',
            'Infopark, Kochi, Kerala',
        ];

        $recruiterNames = [
            'Amit Sharma',
            'Rohit Verma',
            'Neha Agarwal',
            'Pooja Mehta',
            'Suresh Kumar',
            'Ananya Iyer',
            'Kavya Nair',
            'Sneha Patil',
        ];

        $companyDescriptions = [
            'We are a leading Indian technology company delivering scalable digital solutions to enterprises and startups across the country.',
            'Founded in India, our organization focuses on building secure, cloud-native applications for domestic and global clients.',
            'We specialize in innovative software development and IT services with a strong presence across Indian tech hubs.',
        ];

        $employer = Employer::inRandomOrder()->first();

        return [
            'employer_id' => $employer->id,
            'company_name' => $employer->company_name,

            'industry' => $this->fake()->randomElement($industries),
            'company_size' => $this->fake()->randomElement($companySizes),

            'website' => 'https://www.' . \Str::slug($employer->company_name) . '.com',

            'description' => $this->fake()->randomElement($companyDescriptions),

            'recruiter_name' => $this->fake()->randomElement($recruiterNames),

            'contact_phone' => '+91 ' . $this->fake()->numberBetween(6000000000, 9999999999),

            'address' => $this->fake()->randomElement($addresses),

            'recruiter_email' => $this->fake()->unique()->safeEmail(),

            'logo' => 'images/company-placeholder.png',

            'account_status' => $this->fake()->randomElement([
                'Active',
                'Pending Approval',
            ]),

            'verified' => $this->fake()->boolean(40) ? 'Yes' : 'No',

            'jobs_posted' => $this->fake()->numberBetween(1, 25),
            'applicants_received' => $this->fake()->numberBetween(10, 200),

            'last_login' => $this->fake()->optional()->dateTimeBetween('-30 days', 'now'),

            'downloads' => $this->fake()->numberBetween(0, 100),

            'feedback' => $this->fake()->optional()->sentence(),
        ];
    }
}
