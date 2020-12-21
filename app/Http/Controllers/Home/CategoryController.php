<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        $tags = Tag::all();
        return view('home.categories.index')
            ->withCategories($categories)
            ->withTags($tags);
    }


    public function show(Category $category)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = $category->posts()->paginate(5);
        return view('home.categories.show')
            ->withPosts($posts)
            ->withCategory($category)
            ->withTags($tags)
            ->withCategories($categories);
    }
}
