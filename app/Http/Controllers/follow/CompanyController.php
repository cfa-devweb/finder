<?php

namespace App\Http\Controllers\follow;

use App\Http\Controllers\Controller;
use App\Models\follow\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Function to retrieve the entire "Company" table
	public function displaycompany()
    {
        $companies = Company::all();
        return view('company', [
            'company' => $companies
        ]);        
    }

        // Function to insert a company in the database
	public function addcompany(Request $request)
    {
        $addcompany = Company::create([
			'name' => $request->input('company-name'),
			'adress' => $request->input('company-adress'),
			'email' => $request->input('company-mail'),
			'doctor_id' => $request->input('company-phone'),
		]);
        return redirect('/company');
    }
}