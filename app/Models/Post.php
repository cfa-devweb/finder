<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'date_create',
        'name_company',
        'concerned',
        'contact',
        'content',
        'adviser_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'date_create',
    ];

    /**
     * Get the advisers for the post.
     */
    public function advisers() {
        return $this->hasMany(Adviser::class);
    }
}
