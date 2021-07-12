<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
use Illuminate\Http\Request;

class Follow_upController extends Controller
{
    // Function to retrieve the entire "Company" table
    public function displayfollowup()
    {
        $followUp = Follow_up::all();
        return view('student.follow-up', compact('followUp'));
    }
}
