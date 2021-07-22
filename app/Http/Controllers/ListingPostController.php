<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
class ListingPostController extends Controller
{
    public function listingPost() {
        $Posts = Post::all();
        return view('listingPosts', compact('Posts'));

    }

    // Function to insert a Offer Job in the database
    public function addoffer(Request $request)
    { 
        $request->validate([
            'name'=> 'required',
            'date_create' => 'required',
            'name_company' => 'required|max:60',
            'contact' => 'required|max:55',
            'content' => 'required|max:500'
        ]);
        
        Post::create($request->all());
    
        return redirect()
        ->back();
    }

    // Function to delete one post
    public function deletePost($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/listingPosts')->with('success', 'Offre supprimer avec succéss');
    }

    // Fuction to update one post;
    public function updatePost($id) {
        $post = Post::findOrFail($id);
        return view('/listingPosts', compact('Posts'));
    }

}

// error 302 : validation qui ne passe pas
// return redirect : avec message de succès pour vérifier 