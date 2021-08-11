<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'comment',
        'mode_contact',
        'name_contact',
        'answer',
        'enterprise_id',
        'student_id'
    ];

    /**
     * Get the enterprise that owns the follow-up.
     */
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    /**
     * Get the students for the follow-up.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
