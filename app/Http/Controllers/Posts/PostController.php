<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repository\PostRepositoryInterFace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @var PostRepositoryInterFace
     */
    private $postRepository;

    public function __construct(PostRepositoryInterFace $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all();
        return view('users.posts.index')
            ->withPosts($posts);
    }

    public function create()
    {
        $tags = Tag::all(); #todo after create repository transfer this line
        $categories = Category::all(); #todo after create repository transfer this line
        return view('users.posts.create')
            ->withTags($tags)
            ->withCategories($categories);
    }

    public function store(CreatePostRequest $request)
    {
        $validated_request = $request->validated();

        $pictue_name = (Auth::user()->id) . '-' . request('alt') . '-' . Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name);  #todo create image repo and transfer

        $post = $this->postRepository->create($validated_request);

        $post->tags()->attach($request->tags); #todo create tags repo and transfer
        $post->categories()->attach($request->categories); #todo create categories repo and transfer

        $post->image()->create([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]); #todo transfer to image repo

        return redirect()->route('posts.index')
            ->with('status','پسـت جدید با موفقـیت ساختـه شـد.');
    }

    public function show(Post $post)
    {
        $post = $this->postRepository->show($post);
        return view('users.posts.show')->withPost($post);
    }

    public function edit(Post $post)
    {
        $tags = Tag::all(); #todo after create repository transfer this line
        $categories = Category::all(); #todo after create repository transfer this line
        return view('users.posts.edit')
            ->withTags($tags)
            ->withCategories($categories)
            ->withPost($post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated_request = $request->validated();

        $pictue_name = (Auth::user()->id) . '-' . request('alt') . '-' . \Illuminate\Support\Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name); #todo create image repo and transfer

        $post = $this->postRepository->update($validated_request, $post);

        $post->tags()->attach($request->tags); #todo create tags repo and transfer
        $post->categories()->attach($request->categories); #todo create categories repo and transfer

        $post->image()->update([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]); #todo transfer to image repo

        return redirect()->route('posts.index')
            ->with('status','پسـت جدید بروزرسـانی شـد.');
    }

    public function destroy(Post $post)
    {
        $post = $this->postRepository->delete($post);
        return redirect()->route('posts.index');
    }
}
