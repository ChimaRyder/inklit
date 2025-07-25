<?php
namespace App\Http\Services;

use App\Models\Post;
use App\Models\User;

class PostService {
    private int $postsPerPage = 10;

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
        return Post::where('user_id', $id)
            ->where(function ($query) use ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%')
                    ->orWhere('body', 'LIKE', '%' . $q . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->postsPerPage);
    }

    public function getAllPosts()
    {
        return Post::orderBy('created_at', 'desc')->paginate($this->postsPerPage);
    }
    public function getPostsBySearch($search)
    {
        return Post::with('user')
            ->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhere('body', 'LIKE', "%$search%")
            ->orWhere('title', 'LIKE', "%$search%")
            ->orderBy('created_at', 'desc')
            ->paginate($this->postsPerPage);
    }

    public function getTrendingPosts()
    {
        $post = Post::withCount('comments', 'likes')
            ->get();

        $post->each(function ($post) {
            $post->weightedScore = $post->comments_count * 5 + $post->likes_count;
        });

        return $post->sortByDesc('weightedScore')->take(7);
    }

    public function getPost($id) {
        return Post::findOrFail($id);
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
            return redirect()->route('login');
        }

        if(auth()->id() !== $user_id && auth()->user()->role !== 'admin') {
            return abort(403);
        }

        Post::destroy($id);
    }
}
