<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\Job;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {      
        $Sections = Section::where("adviser_id",'=',"1")->paginate(5);;
        $advisers = Adviser::all();
        $jobs = Job::all();
        $adviser_id = '1';
        $Students = Student::whereHas('section', 
                                function ($query) use ($adviser_id){
                                    $query->where('adviser_id','=', $adviser_id);
                                }
                            )->get()->count(); 
        // dd($Students);
        return view('dashboard',compact('Sections','Students','advisers','jobs'));
    }
    public function show()
    {
        return view('dashboard-formation');
    }
    public function post(Request $request)
    {

        // dd($request);
       $result = $request->validate([
            "class_name"=>"required",
            "adviser_id"=> "required",
            "description"=>"required",
            "job_id"=>"required"
        ]);
        
        
        if(!$result){        
            return back()->with("danger" , "Formation n'a pas été rajouter !");  
        }else{               
            
        $data = Section::create($request->all());
        return back()->with("success" , "Formation rajouté avec succè!",500);       
        }
        
        
    }
}
