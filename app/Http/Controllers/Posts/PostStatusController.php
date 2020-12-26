<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\PostRepositoryInterFace;
use Illuminate\Http\Request;

class PostStatusController extends Controller
{
    /**
     * @var PostRepositoryInterFace
     */
    private $postRepository;

    public function __construct(PostRepositoryInterFace $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function status(Request $request, Post $post)
    {
        $post = $this->postRepository->status($post);

        return redirect()->back()
            ->with('status', __('وضـعیت پسـت با موفقـیت تغـییر کرد.'));
    }

    public function restore(Request $request, Post $post)
    {
        $post = $this->postRepository->restore($post);

        return redirect()->route('posts.index')
            ->with('status', __('پسـت با موفقـیت بازیابی شـد.'));
    }

    public function terminate(Request $request, Post $post)
    {
        dd(132);
        $post = $this->postRepository->terminate($post);

        return redirect()->route('posts.index')
            ->with('status', __('پسـت با موفقـیت حـذف شـد.'));
    }
}
