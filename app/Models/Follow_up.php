<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow_up extends Model
{
    protected $fillable = [
        'date',
        'status'
    ];
    public function prospects()
    {
        # code...
        return $this->belongsTo(Prospect::class);
    }
}
