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
        'date_create',
        'name_company',
        'concerned',
        'contact',
        'content',
        'adviser_id',
    ];

    protected $hidden = [
        'date_create',
    ];

    public function adviser() {
        return $this->belongsTo(Adviser::class);
    }

    public function section() {
        return $this->belongsTo(Section::class, 'concerned');
    }
}
