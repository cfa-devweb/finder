<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
use Illuminate\Http\Request;

class Follow_upController extends Controller
{
    public function index($prospectId)
    {
        $followUp = Follow_up::all()->where('prospect_id', $prospectId);
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

        $addFollowUp = Follow_up::create($request->all());

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

        $addFollowUp = Follow_up::updated($request->all());

        return back();
    }
}
