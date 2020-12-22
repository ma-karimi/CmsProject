<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user()->id;
        switch ($request->sort){
            case 'all':
            default:
                $posts = Post::where('user_id', $user)->paginate(5);
                return view('users.posts.index')->withPosts($posts);
            case 'publish':
                $posts = Post::latest()->where('user_id', $user)->where('status', 1)->paginate(5);
                return view('users.posts.index')->withPosts($posts);
            case 'date':
                $posts = Post::latest()->where('user_id', $user)->paginate(5);
                return view('users.posts.index')->withPosts($posts);
            case 'deleted':
                $posts = Post::onlyTrashed()->where('user_id', $user)->paginate(5);
                return view('users.posts.index')->withPosts($posts);
        }
    }


    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('users.posts.create')
            ->withTags($tags)
            ->withCategories($categories);
    }


    public function store(CreatePostRequest $request, Post $post)
    {
        $pictue_name = (Auth::user()->id) . '-' . $request->alt . '-' . Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name);
        $request['user_id'] = Auth::user()->id;
        #$post = create($request->all());
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'user_id' => $request->user_id,
            ]);
        $post->tags()->attach($request->tag);
        $post->categories()->attach($request->category);
        $post->image()->create([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]);
        return redirect()->route('users.posts.index')->with('status','پسـت جدید با موفقـیت ساختـه شـد.');
    }


    public function show(int $post)
    {
        $post = Post::withTrashed()->find($post);
        $this->authorize('view', $post);
        return view('users.posts.show')->withPost($post);
    }


    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('users.posts.edit')
            ->withTags($tags)
            ->withCategories($categories)
            ->withPost($post);
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('users.posts.index');
    }
}
