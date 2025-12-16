<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition(): array
    {
        
        $indianNames = [
            'Amit Sharma',
            'Rohit Verma',
            'Suresh Kumar',
            'Ankit Gupta',
            'Vikram Singh',
            'Neha Agarwal',
            'Pooja Mehta',
            'Kavya Nair',
            'Ananya Iyer',
            'Sneha Patil',
        ];

        
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
            'Swiggy',
            'Zomato',
        ];

        $company = $this->fake()->randomElement($companies);

        return [
            'name' => $this->fake()->randomElement($indianNames),

            'email' => $this->fake()->unique()->safeEmail(),

            'company_name' => $company,
            
            'password' => bcrypt('password123'),

            'company_logo' => 'logos/' . \Str::slug($company) . '.png',

            'status' => 'Active',
        ];
    }
}
