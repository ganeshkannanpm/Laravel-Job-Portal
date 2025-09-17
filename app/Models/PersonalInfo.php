<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'date_of_birth',
        'gender',
        'nationality',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'linkedin_url',
        'github_url',
        'portfolio_url',
        'career_objective',
        'languages_known',
        'willing_to_relocate',
        'work_authorization',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
