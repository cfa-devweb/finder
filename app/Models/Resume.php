<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'driverlicense',
        'vehicle',
        'study',
        'experiences',
        'skills',
        'Center_interest',
        'about_me',
        'student_id',
    ];

    public function student() 
    {
        return $this->belongsTo('App\Models\Student');
    }
}
