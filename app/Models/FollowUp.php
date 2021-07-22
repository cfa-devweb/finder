<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = [
        'date',
        'comment',
        'mode_contact',
        'nom_contact',
        'answer',
        'enterprise_id',
        'student_id'
    ];
    public function enterprises()
    {
        # code...
        return $this->belongsTo(Enterprise::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
