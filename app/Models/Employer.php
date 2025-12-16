<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employer extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */

    use HasFactory;
    
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'company_name',
        'password',
        'company_logo',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function jobs()
    {

        return $this->hasMany(Job::class);
    }

    public function companyProfile(){

        return $this->hasOne(CompanyProfile::class);
    }
}
