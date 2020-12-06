<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $posts=Post::with(['tags','categories','image','author'])->get();
        return view('posts.index')->withPosts($posts);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
