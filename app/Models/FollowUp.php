<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = [
        'date',
        'comment',
        'contact_mode',
        'person_contacted',
        'answer',
        'enterprise_id',
    ];
    public function enterprises()
    {
        # code...
        return $this->belongsTo(Enterprise::class);
    }
}
