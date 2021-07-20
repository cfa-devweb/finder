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
    public function showTable($id){

        $sections = Section::select('class_name')->where("id",'=', $id)->get();
        $adviser = 1;
        $students = Student::where('section_id', '=', $adviser)->get();

        // return 'User '.$id;
        return view('adviser.listingStudent',  compact('students', 'id', 'sections'));

    }

}
