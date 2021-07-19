<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class listingStudent extends Controller
{
    //
    public function index(){
        // $sections = Section::all();
        $students = Student::all();
        return view('adviser.listingStudent', ['students' => $students]);
    }
}
