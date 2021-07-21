<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function index($prospectId)
    {
        $followUp = FollowUp::all()->where('prospect_id', $prospectId);
        return view('student.follow-up', ['followUp' => $followUp, 'prospectId' => $prospectId]);
    }

    // Function to insert a follow-up in the database
    public function createFolllowUp(Request $request)
    {
        $request -> validate([
            'mode_contact' => 'required',
            'date' => 'required',
            'status' => 'required|max:150',
            'comment' => 'required|max:255'
        ]);

        $addFollowUp = FollowUp::create($request->all());

        return back();
    }

    // Function to update a follow-up in the database
    public function editFolllowUp(Request $request)
    {
        $request -> validate([
            'mode_contact' => 'required',
            'date' => 'required',
            'status' => 'required|max:150',
            'comment' => 'required|max:255'
        ]);

        $addFollowUp = FollowUp::updated($request->all());

        return back();
    }
}
