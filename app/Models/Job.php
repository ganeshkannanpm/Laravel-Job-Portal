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
    protected $attributes = [
        'status' => 'Active',
    ];

    protected $casts = [
        'skills_required' => 'array',
    ];

    //helper for safe access
    public function getSkillsRequiredAttribute($value)
    {
        if (empty($value))
            return [];
        if (is_array($value))
            return $value;
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : explode(',', $value);
        }
        return [];
    }


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
