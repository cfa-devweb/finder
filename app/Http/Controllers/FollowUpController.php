<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Support\Facades\Gate;


class FollowUpController extends Controller
{
    public function index($enterpriseId)
    {
        $response = Gate::inspect('followup');
        
        if ($response->allowed()) {

            $followUps = FollowUp::where('enterprise_id', $enterpriseId)->paginate(15);
            return view('student.follow-up', ['followUps' => $followUps, 'enterpriseId' => $enterpriseId]);
        } else {
            $response->message();
        }
    }
}
