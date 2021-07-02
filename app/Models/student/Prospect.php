<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'company_name',
        'phone_contact',
        'email_contact',
    ];
}