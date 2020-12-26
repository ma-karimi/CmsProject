<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasPermissionTo('publisher')) {
            return true;
        }
    }

    public function viewAny(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }


    public function view(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }


    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }


    public function delete(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }


    public function restore(User $user, Post $post)
    {
        return true;
    }


    public function forceDelete(User $user, Post $post)
    {
        return true;
    }
}
