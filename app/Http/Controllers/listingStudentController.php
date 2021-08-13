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
use Illuminate\Support\Facades\Gate;


class listingStudentController extends Controller
{
    //
    public function showTable($id){

        $section = Section::find($id);
        $students = Student::where('section_id', '=', $id)->paginate(7);

        return view('adviser.listingStudent',  compact('id', 'section', 'students'));

    }
    public function showUserInfo($id){

        $response = Gate::inspect('dashboard-formation-suivi');
        
        if ($response->allowed()) {
            $studentid = Student::where('user_id','=',$id)->get();  
            
            $sections = Section::where('id','=',$studentid->first()->section_id)->get();
            
            $FollowUps = FollowUp::where('student_id','=',$studentid->first()->id)->get();
            
            $User = User::where('id','=',$id)->get();
            // $studentclass = Student::select('section_id')->where('id','=',$id)->get();    

            // $sections = Section::select('class_name')->where("id",'=', $studentclass->first()->section_id)->get();
            
            return view('adviser.listingOneStudent', compact('FollowUps','User','studentid','sections'));
        } else {
            echo $response->message();
        }

    }

     // Function to delete one alternant
     public function deleteOneAlternant($id) {

        $response = Gate::inspect('listingAlternant.delete');

        if ($response->allowed()) {

            $post = Student::findOrFail($id);
            $post->delete();
            return redirect()->back()->with('success', 'Alternant supprimé avec succès.');
        } else {
            echo $response->message();
        }
    }

}
