<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('en_IN');

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
            [300000, 600000],    // 3–6 LPA
            [500000, 900000],    // 5–9 LPA
            [800000, 1500000],   // 8–15 LPA
        ];

        $descriptions = [
            'We are looking for a skilled %s to join our growing engineering team in India. The role involves building scalable applications, working closely with product teams, and delivering high-quality software solutions.',
            'As a %s, you will contribute to enterprise-grade applications used by Indian and global clients, focusing on performance, security, and scalability.',
        ];

        $aboutCompanies = [
            'We are a leading Indian IT services company delivering innovative digital solutions to enterprises and startups across India.',
            'Founded in India, we specialize in web and cloud-based solutions for domestic and international clients.',
            'We are a fast-growing Indian technology company focused on modern software development and continuous learning.',
        ];

        $responsibilities = [
            'Develop and maintain scalable web applications using PHP and Laravel',
            'Collaborate with designers and product managers',
            'Optimize MySQL databases and backend performance',
            'Write clean, secure, and maintainable code',
            'Deploy and manage applications on AWS infrastructure',
            'Participate in code reviews and team discussions',
        ];

        $role = $faker->randomElement($roles);
        [$salaryMin, $salaryMax] = $faker->randomElement($salaryRanges);

        return [
            'employer_id' => Employer::inRandomOrder()->first()->id,

            'title'   => $role,
            'company' => $faker->randomElement($companies),
            'location'=> $faker->randomElement($locations),

            'salary_min' => $salaryMin,
            'salary_max' => $salaryMax,

            'experience_level' => $faker->randomElement($experienceLevels),

            'description' => sprintf(
                $faker->randomElement($descriptions),
                $role
            ),

            'responsibilities' => implode("\n", $faker->randomElements($responsibilities, 4)),

            'skills_required' => implode(', ', $skillsByRole[$role]),

            'about_company' => $faker->randomElement($aboutCompanies),

            'schedule' => $faker->randomElement([
                'Full Time', 'Part Time', 'Contract'
            ]),

            'apply_type' => $faker->randomElement(['email', 'external']),
            'apply_link' => $faker->url(),

            'deadline' => now()->addDays(rand(7, 45)),
            'posted' => $faker->randomElement([
                'Today', '1 day ago', '3 days ago', '1 week ago'
            ]),

            'status' => 'Active',
            'featured' => $faker->boolean(20),
        ];
    }
}
