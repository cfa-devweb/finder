<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    // Function to retrieve the entire "Company" table
    public function displaycompany()
    {
        $companies = Prospect::all();
        return view('student.prospect', compact('companies'));
    }


    // Function to insert a company in the database
    public function addcompany(Request $request)
    {

        //
        $validated = $request -> validate([
            'company-phone' => 'required|digits:6|',
            'company-mail' => 'required|email|unique:prospects,email_contact',
            'company-name' => 'required|max:30'
        ]);

        $addcompany = Prospect::create([
            'company_name' => $request->input('company-name'),
            'phone_contact' => $request->input('company-phone'),
            'email_contact' => $request->input('company-mail'),
            'date' => $request->input('contact-date'),
            'student_id' => $request->input('student-id'),
        ]);
        return back();
    }
}
