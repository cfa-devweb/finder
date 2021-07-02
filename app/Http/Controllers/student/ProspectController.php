<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\student\Prospect;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    // Function to retrieve the entire "Company" table
    public function displaycompany()
    {
        $companies = Prospect::all();
        return view('follow.prospect', compact('companies'));
    }







    // Function to insert a company in the database
    public function addcompany(Request $request)
    {
        $addcompany = Prospect::create([
            'company_name' => $request->input('company-name'),
            'phone_contact' => $request->input('company-phone'),
            'email_contact' => $request->input('company-mail'),
        ]);
        return back();
    }
}
