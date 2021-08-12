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

        $section = Section::find($id);
        $students = Student::where('section_id', '=', $id)->get();

        return view('adviser.listingStudent',  compact('id', 'section', 'students'));

    }
    public function showUserInfo($id){
        // dd($id);

        $studentid = Student::where('user_id','=',$id)->get();  
        
        $sections = Section::where('id','=',$studentid->first()->section_id)->get();
        
        // dd($sections);  
        $FollowUps = FollowUp::where('student_id','=',$studentid->first()->id)->get();
        // dd($FollowUps);
        $User = User::where('id','=',$id)->get();
        // $studentclass = Student::select('section_id')->where('id','=',$id)->get();    

        // $sections = Section::select('class_name')->where("id",'=', $studentclass->first()->section_id)->get();
        // dd($sections);
        // dd($student,$User,$FollowUps);
        return view('adviser.listingOneStudent', compact('FollowUps','User','studentid','sections'));

    }

     // Function to delete one alternant
     public function deleteOneAlternant($id) {
        $post = Student::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success', 'Alternant supprimé avec succès.');
    }

}
