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
        $Sections = Section::where("adviser_id",'=',"1")->get();
        $advisers = Adviser::all();
        $jobs = Post::all();
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
}
