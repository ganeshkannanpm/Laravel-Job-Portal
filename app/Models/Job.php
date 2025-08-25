<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function employer(){

        return $this->belongsTo(Employer::class);
    }

    public function savedByUsers()
{
    return $this->belongsToMany(User::class, 'saved_jobs')->withTimestamps();
}

}
