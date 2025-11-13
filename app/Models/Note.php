<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'candidate_id',
        'job_id',
        'title',
        'note',
        'mode',
        'reminder_date',
        'status',
        'created_by',
    ];

    protected $casts = [
        'reminder_date' => 'datetime',
    ];


    public function employer()
    {

        return $this->belongsTo(Employer::class);
    }

    public function job()
    {

        return $this->belongsTo(Job::class);
    }

    public function candidate()
    {

        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function creator()
    {
        return $this->belongsTo(Employer::class, 'created_by');
    }
}
