<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;

class FollowUpController extends Controller
{
    public function index($enterpriseId)
    {
        $followUp = FollowUp::all()->where('enterprise_id', $enterpriseId);
        return view('student.follow-up', ['followUp' => $followUp, 'enterpriseId' => $enterpriseId]);
    }
}
