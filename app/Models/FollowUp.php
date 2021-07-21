<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = [
        'date',
        'comment',
        'mode_contact',
        'status',
        'prospect_id',
    ];
    public function prospects()
    {
        # code...
        return $this->belongsTo(Prospect::class);
    }
}
