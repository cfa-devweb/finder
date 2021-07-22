<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function index($enterpriseId)
    {
        $followUp = FollowUp::all()->where('prospect_id', $enterpriseId);
        return view('student.follow-up', ['followUp' => $followUp, 'prospectId' => $enterpriseId]);
    }

}
