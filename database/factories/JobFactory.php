<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        $companies = [
            'Tata Consultancy Services',
            'Infosys',
            'Wipro',
            'HCL Technologies',
            'Tech Mahindra',
            'Zoho Corporation',
            'Freshworks',
            'Flipkart',
            'Paytm',
            'PhonePe',
            'Reliance Jio',
        ];

        $roles = [
            'PHP Developer',
            'Laravel Developer',
            'Backend Developer',
            'Full Stack Developer',
            'Web Developer',
        ];

        $skillsByRole = [
            'PHP Developer' => [
                'PHP', 'Laravel', 'MySQL', 'REST APIs',
                'Blade', 'AJAX', 'Git', 'Linux'
            ],
            'Laravel Developer' => [
                'Laravel', 'PHP', 'MySQL',
                'Eloquent ORM', 'MVC',
                'JWT Authentication', 'Redis'
            ],
            'Backend Developer' => [
                'PHP', 'Laravel', 'Node.js',
                'MySQL', 'PostgreSQL',
                'AWS EC2', 'Docker'
            ],
            'Full Stack Developer' => [
                'Laravel', 'PHP', 'JavaScript',
                'React', 'MySQL', 'Tailwind CSS',
                'AWS', 'Git'
            ],
            'Web Developer' => [
                'HTML', 'CSS', 'JavaScript',
                'PHP', 'MySQL', 'Bootstrap'
            ],
        ];

        $locations = [
            'Bangalore, KA',
            'Chennai, TN',
            'Hyderabad, TS',
            'Pune, MH',
            'Noida, UP',
            'Gurgaon, HR',
            'Trivandrum, TVM',
            'Kochi, KL',
            'Coimbatore, TN',
        ];

        $experienceLevels = [
            'Fresher',
            '1–2 years',
            '2–4 years',
            '5+ years',
        ];

        $salaryRanges = [
            [300000, 600000],
            [500000, 900000],
            [800000, 1500000],
        ];

        $descriptions = [
            'We are looking for a skilled %s to join our growing engineering team in India.',
            'As a %s, you will contribute to enterprise-grade applications used by Indian and global clients.',
        ];

        $aboutCompanies = [
            'We are a leading Indian IT services company delivering innovative digital solutions.',
            'Founded in India, we specialize in web and cloud-based solutions.',
            'We are a fast-growing Indian technology company focused on modern development.',
        ];

        $responsibilities = [
            'Develop and maintain scalable web applications using PHP and Laravel',
            'Collaborate with designers and product managers',
            'Optimize databases and backend performance',
            'Write clean, secure, and maintainable code',
            'Deploy and manage applications on cloud infrastructure',
            'Participate in code reviews',
        ];

        $role = fake()->randomElement($roles);
        [$salaryMin, $salaryMax] = fake()->randomElement($salaryRanges);

        return [
            'employer_id' => Employer::inRandomOrder()->first()->id,

            'title' => $role,
            'company' => fake()->randomElement($companies),
            'location' => fake()->randomElement($locations),

            'salary_min' => $salaryMin,
            'salary_max' => $salaryMax,

            'experience_level' => fake()->randomElement($experienceLevels),

            'description' => sprintf(
                fake()->randomElement($descriptions),
                $role
            ),

            'responsibilities' => implode("\n", fake()->randomElements($responsibilities, 4)),
            'skills_required' => implode(', ', $skillsByRole[$role]),

            'about_company' => fake()->randomElement($aboutCompanies),

            'schedule' => fake()->randomElement(['Full Time', 'Part Time', 'Contract']),
            'apply_type' => fake()->randomElement(['email', 'external']),
            'apply_link' => fake()->url(),

            'deadline' => now()->addDays(rand(7, 45)),
            'posted' => fake()->randomElement([
                'Today', '1 day ago', '3 days ago', '1 week ago'
            ]),

            'status' => 'Active',
            'featured' => fake()->boolean(20),
        ];
    }
}
