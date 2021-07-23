<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $sectionUser = Auth::user()->student->section;
        // dd($sectionUser);
        // $post = Post::where('section_id','=',$sectionUser)->get();
        
        $posts = Post::all();
        // dd($posts);
        return view('index',compact('posts'));
    }
}
