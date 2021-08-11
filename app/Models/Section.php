<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'class_name',
        'description',
        'adviser_id',
        'job_id'
    ];

    /**
     * Get the adviser that owns the section.
     */
    public function adviser()
    {
        return $this->belongsTo(Adviser::class);
    }

    /**
     * Get the job that owns the section.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the students for the section.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Get the users for the section.
     */
    public function users()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Get the follow-ups for the section.
     */
    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }


}
