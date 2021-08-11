<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsHasJobs extends Model
{
    use HasFactory;

    public function post()
    {
        # code...
        return $this->hasMany(Post::class);
    }
    public function job()
    {
        # code...
        return $this->hasMany(Job::class);
    }
}
