<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Student;

class ProfilController extends Controller
{
    // Function to return the view create-profil
    public function CreateProfil()
    {
        // $Profil = Resume::all();
        return view('student.create-profil');
    }

    // Function to save the from in the Resume table
    public function SaveProfil()
    {

        $skills1 = request('skills1');
        $skills2 = request('skills2');
        $skills3 = request('skills3');
        $skills4 = request('skills4');

        $interest1 = request('interest1');
        $interest2 = request('interest2');
        $interest3 = request('interest3');
        $interest4 = request('interest4');
        $interest5 = request('interest5');
        $interest6 = request('interest6');
        $interest7 = request('interest7');
        $interest8 = request('interest8');
        $interest9 = request('interest9');
        $interest10 = request('interest10');



        $profil = new Resume();


        $profil -> study = request('checkboxStudy');
        $profil -> experiences = request('checkboxExperience');
        $profil -> skills = $skills1 .',' . $skills2 .',' .$skills3 .',' .$skills4  ;
        $profil -> driverlicense = request('checkboxDriverLicense');        
        $profil -> vehicle = request('checkboxDriverVehicle');
        $profil -> center_interest =$interest1 . ',' . $interest2 . ',' . $interest3 . ',' . $interest4 . ',' . $interest5 .','. $interest6 . ',' . $interest7 . ',' .$interest8 . ','.$interest9 . ',' . $interest10 ;
        $profil -> about_me = request('aboutMe');
        $profil -> student_id = 1;



        $profil -> save();

        return redirect ('/student/create-profil');
    }

    // Function to return the view profil
    public function ShowProfil()
    {
        $sections = Section::all();
        $students = Student::all();

        return view('student.profil',  compact('sections', 'students'));
    }
}
