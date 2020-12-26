<?php


namespace App\Repository;


use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostRepository implements PostRepositoryInterFace
{

    public function all()
    {
        $user = Auth::user();

        if($user->hasPermissionTo('publisher')){
            switch (request()->filter){
                case 'all':
                default:
                    return $posts = Post::paginate(5);
                case 'published':
                    return $posts = Post::latest()->where('status', 1)->paginate(5);
                case 'unpublished':
                    return $posts = Post::latest()->where('status', 0)->paginate(5);
            }
        }
        else{
            switch (request()->filter){
                case 'all':
                default:
                    return $posts = Post::where('user_id', $user->id)->paginate(5);
                case 'published':
                    return $posts = Post::latest()->where('user_id', $user->id)
                        ->where('status', 1)->paginate(5);
                case 'unpublished':
                    return $posts = Post::latest()->where('user_id', $user->id)
                        ->where('status', 0)->paginate(5);
                case 'date':
                    return $posts = Post::latest()->where('user_id', $user->id)->paginate(5);
                case 'deleted':
                    return $posts = Post::onlyTrashed()->where('user_id', $user->id)->paginate(5);
            }
        }
    }

    public function create($validated_request)
    {
        return $post = auth()->user()->posts()->create($validated_request);
    }

    public function show(Post $post)
    {
        return $post = Post::withTrashed()->find($post->id);
    }

    public function update($validated_request, Post $post)
    {
        return $post = $post->update($validated_request);
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }

    public function status(Post $post)
    {
        return $post->update([
            'status' => !$post->status,
        ]);
    }

    public function restore(Post $post)
    {
        $post = Post::withTrashed()->find($post->id);
        $post->restore();
    }

    public function terminate(Post $post)
    {
        $post = Post::withTrashed()->find($post->id);
        Storage::delete($post->image->path);
        $post->forceDelete();
    }
}
