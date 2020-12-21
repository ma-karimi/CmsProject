<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TerminateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,int $post)
    {
        $post = Post::withTrashed()->find($post);
        Storage::delete($post->image->path);
        $post->forceDelete();
        return redirect()->route('users.posts.index');
    }
}
