<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function IndexPost()
    {


        $posts = Post::latest()->get();
        return view('posts.index',compact('posts'));
    }






function createPost(){


$this->authorize('create', Auth::user());
return view('posts.create');

}


function storePost(){

}


    function editPost(Post $post, $id)
    {
        $this->authorize('delete', $post);
        $posts = Post::find($id);

        return $posts;


    }// end  method



    public function destroy(Request $request, Post $post)
    {
        
        // dd($post->id);
        
        $this->authorize('delete', Auth::user());
    
        $post->delete();

    
        return redirect()->back();

    }// end of the method







}
