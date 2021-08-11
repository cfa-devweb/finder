<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'class_name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'remember_token',
    ];

    /**
     * Get the user that owns the adviser.
     */

    public function user() {

        return $this->belongsTo('App\Models\User');
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
