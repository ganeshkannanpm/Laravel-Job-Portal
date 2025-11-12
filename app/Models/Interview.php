<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'candidate_id',
        'job_id',
        'interview_date',
        'interview_time',
        'location',
        'mode',
    ];

    public function employer(){

        return $this->belongsTo(Employer::class);
    }

    public function job(){

        return $this->belongsTo(Job::class);
    }

    public function candidate(){

        return $this->belongsTo(User::class,'candidate_id');
    }
}
