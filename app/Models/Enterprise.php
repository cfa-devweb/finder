<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_company',
        'name_contact',
        'phone_contact',
        'email_contact',
        'student_id',
    ];

    /**
     * Get the follow-ups for the enterprise.
     */
    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }

    /**
     * Get the students for the enterprise.
     */
    public function students()
    {
        return $this->hasMany(Students::class);
    }
}
