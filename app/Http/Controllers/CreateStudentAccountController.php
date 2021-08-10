<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Models\User;
use App\Models\Student;

class CreateStudentAccountController extends Controller {

    /**
     * Insert new student in database table students.
     */
    protected function createStudent(Request $request)
    {
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required|unique:users',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'phone' => $request->input('phone', ' '),
            'password' => $request->input('password', ' ')
        ]);

        Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender', 'other'),
            'birthday' => $request->input('birthday', '1999-07-24'),
            'active' => $request->input('active', '1'),
            'city' => $request->input('city', 'noumea'),
            'section_id' => $request->input('section_id'),
            'user_id' => $user->id
        ]);
        
        return redirect()
            ->route('dashboard-formation')
            ->with("successadd", "L'alternant a bien été ajouté");
    }
}