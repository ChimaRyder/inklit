<?php

namespace App\Livewire;

use App\Http\Services\PostService;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
{
    use WithPagination;

    private PostService $postService;

    public function boot(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function render()
    {
        $posts = $this->postService->getAllPosts();
        return view('livewire.posts-table', compact('posts'));
    }

    public function deletePost($postId, $userId) {
        $this->postService->deletePost($postId, $userId);
    }
}
