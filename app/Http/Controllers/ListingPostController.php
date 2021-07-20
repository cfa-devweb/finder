<?php 
namespace App\Http\Controllers;

use App\Models\Post;
class ListingPostController extends Controller
{
    public function listingPost() {
        $Posts = Post::all();
        return view('listingPost', compact('Posts'));
    }

    // Function to insert a Offer Job in the database
    // public function addoffer(Request $request)
    // { 
    //     Post::create([
    //         'name' => $request->input('entitled'),
    //         'name_company' => $request->input('company'),
    //         'contact' => $request->input('contact'),
    //         'content' => $request->input('content'),
    //     ]);

        
    //     return redirect()->back();

    //     // return redirect('/listingPost');

    // }
}


