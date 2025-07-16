<?php
namespace App\Http\Services;

use App\Models\Post;

class PostService {
    public function createPost($request): void
    {
        Post::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'user_id' => auth()->id(),
        ]);
    }

    public function getUserPosts()
    {
        return auth()->user()->posts;
    }

    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPost($id) {
        return Post::find($id);
    }

    public function updatePost($request): void
    {
        Post::update([
            'title' => $request['title'],
            'body' => $request['body'],
        ]);
    }
}
