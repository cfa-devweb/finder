<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\StudentAdd;

class AddStudentController extends Controller
{
    //

    public function insert(Request $request) {

        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $request->input('first_name');
        $request->input('last_name');
        $request->input('email');
        $request->input('phone');

        $student->save();
        return redirect('addStudentModal');
    }

}