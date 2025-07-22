<?php

namespace App\Livewire;

use App\Http\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Feed extends Component
{
    use WithPagination;

    private PostService $postService;

//    public $postList;

    public function boot(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function render()
    {
        $posts = $this->postService->getAllPosts();

        return view('livewire.feed',  compact('posts'));
    }

    #[On('updateList')]
    public function update() {
        session()->flash('message', 'Post deleted successfully');
    }
}
