<?php


namespace App\Repository;


use App\Models\Post;

interface PostRepositoryInterFace
{
    public function all();
    public function create($validated_request);
    public function show(Post $post);
    public function update($validated_request, Post $post);
    public function delete(Post $post);
    public function status(Post $post);
    public function restore(Post $post);
    public function terminate(Post $post);
}
