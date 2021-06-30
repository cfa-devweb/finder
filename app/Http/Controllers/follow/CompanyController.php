<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
	public function displaycompany()
    {
        $companies = Company::all();
        return view('company', [
            'company' => $companies
        ]);        
    }

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