<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendPublishPostMailJob;
use App\Models\Post;
use Illuminate\Http\Request;

class PostStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Post $post)
    {
        $post->update([
            'status' => !$post->status,
        ]);
        if ($post->status == 1){
            SendPublishPostMailJob::dispatch($user)->delay(10);
        }
        return redirect()->back()->with('status', __('وضـعیت کاربـر با موفقـیت تغـییر کرد.'));
    }
}
