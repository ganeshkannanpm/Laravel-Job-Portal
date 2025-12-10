<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'company_name',
        'industry',
        'company_size',
        'website',
        'description',
        'recruiter_name',
        'contact_phone',
        'address',
        'recruiter_email',
        'logo',
        'account_status',
        'verified',
        'jobs_posted',
        'applicants_received',
        'last_login',
        'downloads',
        'feedback',
    ];

    public function employer()
    {

        return $this->belongsTo(Employer::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id', 'employer_id');
    }

}
