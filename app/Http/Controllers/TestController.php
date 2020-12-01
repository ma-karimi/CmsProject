<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $posts=Post::all();
        return view('test')->withPosts($posts);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
