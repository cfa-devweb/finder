<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListingPostController extends Controller
{
    //list all offer
    public function listingPost() {

        $response = Gate::inspect('listingsPosts');

        if ($response->allowed()) {
            $Posts = Post::paginate(7);
            $sections = Section::all();
            return view('listingPosts', compact('Posts', 'sections'));
        } else {
            $response->message();
        }

    }

    //read one offer
    public function readPost($id) {

        $Posts = Post::findOrFail($id);
        return view('listingPosts', compact('Posts'));

    }

    // Function to insert a Offer Job in the database
    public function addoffer(Request $request)
    { 
        $response = Gate::inspect('post');

        if ($response->allowed()) {
            $request->validateWithBag('post', [
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
            ->with('successadd', "Offre d'alternance crée avec succès");

        } else {
            echo $response->message();
        }
    }

    // Function to delete one post
    public function deletePost($id) {

        $response = Gate::inspect('listingPosts.delete');

        if ($response->allowed()) {

            $post = Post::findOrFail($id);
            $post->delete();
            return redirect('/listingPosts')->with('successdelete', "Offre d'alternance supprimée avec succès.");

        } else {
            echo $response->message();
        }
    }

    // Function to update one post;
    public function updatePost($id) {

        $response = Gate::inspect('update');

        if ($response->allowed()) {
            $attributes  = request()->validateWithBag('put', [
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

            return redirect('/listingPosts')->with('successedit', "Offre d'alternance modifiée avec succès.");
        } else {
            echo $response->message();
        }
    }

}

// error 302 : validation qui ne passe pas
// return redirect : avec message de succès pour vérifier 