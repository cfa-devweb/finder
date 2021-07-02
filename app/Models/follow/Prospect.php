<?php

namespace App\Models\follow;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'company_name', 'phone_contact', 'email_contact',
    ];
}