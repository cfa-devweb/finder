<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;

class FollowUpController extends Controller
{
    public function index($enterpriseId)
    {
        $followUps = FollowUp::where('enterprise_id', $enterpriseId)->paginate(15);
        return view('student.follow-up', ['followUps' => $followUps, 'enterpriseId' => $enterpriseId]);
    }
}
