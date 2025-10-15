<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'schedule',
        'location',
        'experience_level',
        'salary_min',
        'salary_max',
        'apply_type',
        'apply_link',
        'description',
        'responsibilities',
        'about_company',
        'skills_required',
        'deadline',
        'posted',
        'featured',
    ];

    protected $casts = [
        'skills' => 'array',
    ];


    public function employer()
    {

        return $this->belongsTo(Employer::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_jobs')->withTimestamps();
    }

    public function jobApplication()
    {

        return $this->hasMany(JobApplication::class, 'job_id');
    }

}
