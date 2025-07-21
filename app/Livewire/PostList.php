<?php

namespace App\Livewire;

use App\Http\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    private PostService $postService;

    #[Url(as: 'q')]
    public string $query = '';

    public function boot(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function render()
    {
        $posts = $this->postService->getUserPosts(auth()->user()->id, $this->query);

        return view('livewire.post-list',  compact('posts'));
    }

    #[On('updateList')]
    public function updateOnDelete() {
        session()->flash('success', 'Post updated successfully');
    }

    #[On('searchPosts')]
    public function searchPosts(string $query)
    {
        $this->query = $query;
    }

}
