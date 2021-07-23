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
        'city',
        'section_id',
        'find_company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'type',
        'gender',
        'date_of_birth',
        'city',
    ];

    /**
     * Get the user that owns the student
     */

    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    public function section() {
        # code...
        return $this->belongsTo(Section::class);
    }
    public function sections() {
        # code...
        return $this->hasMany(Section::class);
    }

    public function followUps() {
        # code...
        return $this->hasMany(FollowUp::class);
    }
    
    public function enterprises() {
        # code...
        return $this->hasMany(Enterprise::class);
    }
    public function users()
    {
        # code...
        return $this->hasMany(Student::class);
    }
}
