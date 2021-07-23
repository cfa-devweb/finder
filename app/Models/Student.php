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

    protected $hidden = [
        'gender',
        'birthday',
        'active',
        'city',
        'section_id',
        'user_id',
    ];

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
    public function getSectionAttribute()
    {
        return $this->section_id ;
    }

    /**
     * Get the user that owns the student
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }
    
    public function enterprises()
    {
        return $this->hasMany(Enterprise::class);
    }

    public function users()
    {
        return $this->hasMany(Student::class);
    }

}
