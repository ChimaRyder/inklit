<?php

namespace App\Livewire;

use App\Http\Services\PostService;
use Livewire\Component;

class Feed extends Component
{
    private PostService $postService;

    public $posts;

    public function boot(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function render()
    {
        $this->posts = $this->postService->getAllPosts();

        return view('livewire.feed');
    }
}
