<?php

namespace App\Models\follow;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'adress', 'mail', 'phone',
    ];
}