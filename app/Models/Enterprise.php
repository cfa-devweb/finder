<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $fillable = [
        'name_company',
        'name_contact',
        'phone_contact',
        'email_contact',
        'student_id',
    ];
    public function followUps()
    {
        # code...
        return $this->hasMany(FollowUp::class);
    }
    public function students()
    {
        # code...
        return $this->hasMany(Students::class);
    }
}
