<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enterprise;
use App\Models\Adviser;
use App\Models\FollowUp;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class listingStudentController extends Controller
{
    //
    public function showTable($id){

        $sections = Section::select('class_name')->where("id",'=', $id)->get();
        $students = Student::where('section_id', '=', $id)->get();

        return view('adviser.listingStudent',  compact('id', 'sections', 'students'));

    }
    public function showUserInfo($id){

               
        $FollowUps = FollowUp::where('student_id','=',$id)->get();
        // dd($FollowUps);

        $User = User::where('id','=',$id)->get();
        $student = Student::where('id','=',$id)->get();
        // dd($User);
        return view('adviser.listingOneStudent', compact('FollowUps','User','student'));

    }

}
