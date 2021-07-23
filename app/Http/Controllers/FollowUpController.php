<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;

class FollowUpController extends Controller
{
    public function index($enterpriseId)
    {
        $followUps = FollowUp::all()->where('enterprise_id', $enterpriseId);
        return view('student.follow-up', ['followUps' => $followUps, 'enterpriseId' => $enterpriseId]);
    }
}
