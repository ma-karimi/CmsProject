<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::where('status',1)->paginate(5);
        return view('home.posts.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories);
    }

    public function show(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('home.posts.show')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($categories);
    }
}
