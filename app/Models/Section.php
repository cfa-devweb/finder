<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'class_name',
        'description',
        'adviser_id',
        'job_id'
    ];
    public function adviser()
    {
        # code...
        return $this->belongsTo(Adviser::class);
    }
    public function jobs()
    {
        # code...
        return $this->belongsTo(Job::class);
    }
    public function students()
    {
        # code...
        return $this->hasMany(Student::class);
    }
    public function users()
    {
        # code...
        return $this->hasMany(Student::class);
    }
    public function followUps()
    {
        # code...
        return $this->hasMany(FollowUp::class);
    }
    
    
}
