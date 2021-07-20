<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Students;

class AddStudentController extends Controller
{
    //
    public function addStudent(Request $request) {

        $request->validate([

            'first_name'=> 'required',
            'last_name'=> 'required|max:255',
            'gender' => 'required',
            'email' => 'required|max:255',
            'date_of_birth' => 'required',
            'city' => 'required',
            'phone' => 'required|max:6',
            'password' => 'required'
            
        ]);

        Students::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'section_id' => $request->input('section_id'),
        ]);

        return back();
    }

}