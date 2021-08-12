<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Adviser;
use Illuminate\Support\Facades\Auth;

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
        $profil -> experience = request('checkboxExperience');
        $profil -> skills = $skills1 .',' . $skills2 .',' .$skills3 .',' .$skills4  ;
        $profil -> driver_license = request('checkboxDriverLicense');
        $profil -> vehicle = request('checkboxDriverVehicle');
        $profil -> interests =$interest1 . ',' . $interest2 . ',' . $interest3 . ',' . $interest4 . ',' . $interest5 .','. $interest6 . ',' . $interest7 . ',' .$interest8 . ','.$interest9 . ',' . $interest10 ;
        $profil -> about_me = request('aboutMe');
        $profil -> student_id = 1;



        $profil -> save();

        return redirect()->route('home');
    }

    // Function to return the view profil
    public function ShowProfil(Request $request)
    {
        $student = $request->user()->student;

        return view('student.profil',  compact('student'));
    }

    // Function to update the profil
    public function UpdateProfil(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'birthday' => 'required',
            'city' => 'required',
            'phone' => 'required|digits:6',
            'email' => 'required',
        ]);

        $student = Student::find($id);
        $student->update($request->except(['email', 'phone']));
        $student->user->update($request->only(['email', 'phone']));

        return redirect()->back()->with('successadd', 'Vos informations personnelles ont été mises à jour.');
    }
}