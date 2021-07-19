<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class listingStudentController extends Controller
{
    //
    public function showTable(){

        $section = Section::table('sections')
            ->join('students','students.section_id','=','sections.id')
            ->get();

        $students = Student::all();

        $prospects = Prospect::table('prospects')
            ->join('follow_ups','follow_ups.id','=','prospects.id')
            ->join('students','students.id','=','prospects.student_id')
            ->get();

        return view('adviser.listingStudent',  compact('students'));


    }
}
