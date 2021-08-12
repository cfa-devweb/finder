<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'active',
        'city',
        'section_id',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'gender',
        'birthday',
        'active',
        'city',
        'section_id',
        'user_id',
    ];

    /**
     * Get the user that owns the student
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the section that owns the student.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the resume record associated with the student.
     */
    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    /**
     * Get the follow-ups for the student.
     */
    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }

    /**
     * Get the enterprises for the student.
     */
    public function enterprises()
    {
        return $this->hasMany(Enterprise::class);
    }

    /**
     * Get the student's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
