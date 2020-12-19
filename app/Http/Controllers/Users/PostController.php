<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->authorizeResource(Post::class, 'post');
    }


    public function index()
    {
//        $posts=Post::with(['tags','categories','image','author'])->get();
        $posts = Post::latest()->where('user_id', Auth::user()->id)->paginate(5);
        return view('users.posts.index')->withPosts($posts);
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
        $pictue_name = (Auth::user()->id) . '-' . request('alt') . '-' . Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name);

        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);

        $post->image()->create([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]);
        return redirect()->route('users.posts.index')
            ->with('status','پسـت جدید با موفقـیت ساختـه شـد.');
    }


    public function show(Post $post)
    {
//        $this->authorize('view', $post);
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


    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $pictue_name = (Auth::user()->id) . '-' . request('alt') . '-' . Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name);

        $post = auth()->user()->posts()->update($request->validated());
        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);

        $post->image()->update([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]);
        return redirect()->route('users.posts.index')
            ->with('status','پسـت جدید بروزرسـانی شـد.');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('users.posts.index');
    }
}
