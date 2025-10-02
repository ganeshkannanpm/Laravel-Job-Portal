<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'degree',
        'institution',
        'start_year',
        'end_year',
        'details',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
