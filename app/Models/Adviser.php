<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'class_name',
        'first_name',
        'last_name',
        'email',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
