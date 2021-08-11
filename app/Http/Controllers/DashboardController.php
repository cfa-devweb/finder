<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\Post;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {      
        $Sections = Section::where("adviser_id",'=',"1")->paginate(5);
        $advisers = Adviser::all();
        $Post = Post::all();
        $adviser_id = '1';
        $Students = Student::whereHas('section',
                                function ($query) use ($adviser_id){
                                    $query->where('adviser_id','=', $adviser_id);
                                }
                            )->get()->count();
        // dd($Students);

        // dd($Sections->first()->students()->whereHas('followUps',function($query){
        //     $query->where('answer','refus');
        // })->count());

        return view('dashboard',compact('Sections','Students','advisers','Post'));
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
        
        
        if (!$result){        
            return back()->with('successdelete', 'Erreur lors de la création de la formation');  
        } else {               
            
        $data = Section::create($request->all());
        return back()->with('successadd', "Formation créer avec succèss");       
        }
        // redirect()->back();
    }
    
}
