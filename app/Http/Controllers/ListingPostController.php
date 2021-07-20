<?php 
namespace App\Http\Controllers;
use App\Models\Post;
class ListingPostController extends Controller
{
    public function listingPost() {
        $Posts = Post::all();
        return view('listingPost', compact('Posts'));
    }
}