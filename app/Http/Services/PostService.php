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

    public function getUserPosts($id, $q)
    {
        $posts = User::find($id)->posts;

        return $posts->filter(function ($post) use ($q) {
            return str_contains($post->body, $q) || str_contains($post->title, $q);
        });
    }

    public function getAllPosts()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    public function getPost($id) {
        return Post::find($id);
    }

    public function updatePost($id, $request): void
    {
        if(!auth()->check()) {
            redirect()->route('login');
            return;
        }

        $post = $this->getPost($id);

        if(auth()->id() !== $post->user_id) {
            abort(403);
        }

        $post->title = $request['title'];
        $post->body = $request['body'];

        $post->save();
    }

    public function deletePost($id, $user_id)
    {
        if(!auth()->check()) {
            redirect()->route('login');
            return;
        }

        if(auth()->id() !== $user_id) {
            abort(403);
        }

        Post::destroy($id);
    }
}
