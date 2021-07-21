<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'date_of_birth',
        'city',
        'phone',
        'password',
        'section_id',
    ];


    protected $hidden = [
        'gender',
        'date_of_birth',
        'city',
        'phone',
        'password',
    ];

    public function sections()
    {
        # code...
        return $this->hasMany(Section::class);
    }
}