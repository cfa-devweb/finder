<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\Post;
use App\Models\Section;
use App\Models\Student;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{    
    public function index() {

        $response = Gate::inspect('dashboard-index');

        if ($response->allowed()) {

            $Sections = Section::where("adviser_id",'=',"1")->paginate(7);
            $advisers = Adviser::all();
            $Post = Post::all();
            $adviser_id = '1';
            $Students = Student::all();
            $jobs = Job::all();
    
            return view('dashboard',compact('Sections','Students','advisers','Post','jobs'));

        } else {
            echo $response->message();
        }
    }

    public function show()
    {
        $response = Gate::inspect('dashboard-formation');

        if (!$response->allowed()) {
            return view('dashboard-formation');
        } else {
            echo $response->message();
        }
    }

    public function post(Request $request)
    {

        $response = Gate::inspect('dashboard-post');

        if ($response->allowed()) {

            $result = $request->validateWithBag('post', [
                    "class_name"=>"required",
                    "adviser_id"=> "required",
                    "description"=>"required",
                    "job_id"=>"required"
                ]);
                
            if (!$result){
                return back()->with('successdelete', 'Erreur lors de la création de la formation.');
            } else {
                $data = Section::create($request->all());
                return back()->with('successadd', "Formation crée avec succès.");
            }
        } else {
            echo $response->message();
        }
    }
    
}
