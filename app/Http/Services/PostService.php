<?php
namespace App\Http\Services;

use App\Models\Post;
use App\Models\User;

class PostService {
    public function createPost($request): void
    {
        Post::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'user_id' => auth()->id(),
        ]);
    }

    public function getUserPosts($id)
    {
        return User::find($id)->posts;
    }

    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPost($id) {
        return Post::find($id);
    }

    public function updatePost($id, $request): void
    {
        if(!auth()->hasUser()) {
            redirect()->route('login');
            return;
        }

        $post = $this->getPost($id);

        $post->title = $request['title'];
        $post->body = $request['body'];

        $post->save();
    }

    public function deletePost($id)
    {
        if(!auth()->hasUser()) {
            redirect()->route('login');
            return;
        }

        Post::destroy($id);
    }
}
