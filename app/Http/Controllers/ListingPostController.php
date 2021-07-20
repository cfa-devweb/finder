<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ListingPostController extends Controller
{
    public function listingPost() {
        $Jobs = Post::all();
        return view('listingPost', compact('Jobs'));
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

