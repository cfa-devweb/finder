<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
use Illuminate\Http\Request;

class Follow_upController extends Controller
{
    public function displayfollowup($prospectId)
    {
        //
        $followUp = Follow_up::all()->where('prospect_id', $prospectId);
        return view('student.follow-up', compact('followUp'));
    }
}
