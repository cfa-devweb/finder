<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'driver_license',
        'vehicle',
        'study',
        'experience',
        'skills',
        'interests',
        'about_me',
        'student_id',
    ];

    /**
     * Get the student that owns the resume.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
