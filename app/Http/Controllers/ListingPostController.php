<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;
class ListingPostController extends Controller
{
    //list all offer
    public function listingPost() {
        $Posts = Post::all();
        $sections = Section::all();
        return view('listingPosts', compact('Posts', 'sections'));
    }

    //read one offer
    public function readPost($id) {
        $Posts = Post::findOrFail($id);
        return view('listingPosts', compact('Posts'));

    }

    // Function to insert a Offer Job in the database
    public function addoffer(Request $request)
    { 
        $request->validate([
            'name'=> 'required',
            'date_create' => 'required',
            'name_company' => 'required|max:60',
            'concerned' => 'required|max:60',
            'contact' => 'required|max:55',
            'content' => 'required|max:800'
        ]);
        
        Post::create($request->all());
    
        return redirect()
        ->back()
        ->with('successadd', "Offre d'alternance créer avec succèss");
    }


    // Function to delete one post
    public function deletePost($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/listingPosts')->with('successdelete', "Offre d'alternance supprimer avec succèss");
    }

    // Fuction to update one post;
    public function updatePost($id) {
        $attributes  = request()->validate([
            'name'=> 'required',
            'date_create' => 'required',
            'name_company' => 'required|max:60',
            'concerned' => 'required|max:60',
            'contact' => 'required|max:55',
            'content' => 'required|max:800'
        ]);
        // dd($request);
        $post = Post::findOrFail($id);
        $post->update($attributes);

        return redirect('/listingPosts')->with('successedit', "Offre d'alternance modifier avec succèss");
    }

}

// error 302 : validation qui ne passe pas
// return redirect : avec message de succès pour vérifier 