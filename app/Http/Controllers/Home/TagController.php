<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::paginate(5);
        return view('home.tags.index')
            ->withCategories($categories)
            ->withTags($tags);
    }


    public function show(Tag $tag)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = $tag->posts()->paginate(5);
        return view('home.tags.show')
            ->withPosts($posts)
            ->withTag($tag)
            ->withTags($tags)
            ->withCategories($categories);
    }
}
