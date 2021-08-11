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
            'gender' => 'required',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'phone' => $request->input('phone', ' '),
            'password' => $request->input('password', ' ')
        ]);

       Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday', '1999-07-24'),
            'active' => $request->input('active', '1'),
            'city' => $request->input('city', 'noumea'),
            'section_id' => $request->input('section_id'),
            'user_id' => $user->id
        ]);

        // MAIL AFTER REGISTRATION
        // $details = [
        //     'title' => 'Take a look of your new profil on Kinder.nc',
        //     'body' => 'kndrx.github.io',
        // ];

        // \Mail::to('ptitkens@gmail.com')->send(new \App\Mail\MailController($details));

        return back()
            ->with("successadd", "L'alternant a bien été ajouté");
        }
}