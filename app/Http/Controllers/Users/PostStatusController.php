<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Post $post)
    {
        $post->update([
            'status' => !$post->status,
        ]);
        return redirect()->back()->with('status', __('وضـعیت پسـت با موفقـیت تغـییر کرد.'));
    }
}
