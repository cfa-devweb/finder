<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use Illuminate\Http\Request;

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
        dd($request);
        $addcompany = Prospect::create([
            'company_name' => $request->input('company-name'),
            'phone_contact' => $request->input('company-phone'),
            'email_contact' => $request->input('company-mail'),
        ]);
        return back();
        // return redirect('/prospect');

    }
}
