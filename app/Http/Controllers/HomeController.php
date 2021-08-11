<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostsHasJobs;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        if (Auth::user()->student)
        {
            //$sectionUser = Auth::user()->student->section;
        }
        else if (Auth::user()->adviser)
        {
            $adviser = Auth::user()->adviser;
        }

        //dd($sectionUser);
        //$sectionidJob = Section::select('job_id')->where('id','=',$sectionUser)->get();
        // dd($sectionidJob->first()->job_id);
        //$tablepostJob = PostsHasJobs::select('*')->where('job_id','=',$sectionidJob->first()->job_id)->get();
        // dd($sectionidJob);
        $posts = Post::all();
        // dd($posts);
        return view('index',compact('posts'));
    }
}
