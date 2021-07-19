<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'company_name',
        'phone_contact',
        'email_contact',
        'date',
        'student_id',
    ];
    public function followUps()
    {
        # code...
        return $this->hasMany(Follow_up::class);
    }
    public function students()
    {
        # code...
        return $this->hasMany(students::class);
    }
}
