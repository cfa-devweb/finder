<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'name_company',
        'domaine',
        'date_create',
        'contact',
        'content',
        'adviser_id',
    ];
}
