<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Gate;


class CreateStudentAccountController extends Controller
{

    /**
     * Insert new student in database table students.
     */
    protected function createStudent(Request $request)
    {
        $response = Gate::inspect('create.student');

        if ($response->allowed()) {
            $request->validateWithBag('post', [
                'first_name'=> 'required',
                'last_name'=> 'required',
                'email' => 'required|unique:users',
                'gender' => 'required',
            ]);

            $user = User::create([
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => $request->input('password')
            ]);

        $student = Student::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'birthday' => $request->input('birthday', '1999-07-24'),
                'active' => $request->input('active', '1'),
                'city' => $request->input('city', 'noumea'),
                'section_id' => $request->input('section_id'),
                'user_id' => $user->id
            ]);

            $email = $request->get('email');

            Mail::to($email)
                ->send(new RegisterMail($user, $student));

            return back()
                ->with("successadd", "L'alternant a bien été ajouté.");
        } else {
            $response->message();
        }
    }
}
