<?php

namespace App\Livewire;

use App\Http\Services\LikeService;
use App\Http\Services\PostService;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Post extends Component
{
    private LikeService $likeService;
    private PostService $postService;

    public $post;
    public string $date;

    public bool $showComments;

    public function boot(LikeService $likeService, PostService $postService)
    {
        $this->likeService = $likeService;
        $this->postService = $postService;

    }

    public function mount() {
       $this->showComments = Route::currentRouteName() === 'post';
    }

    public function render()
    {
        return view('livewire.post');
    }

    public function deletePost(): void
    {
        $this->postService->deletePost($this->post->id, $this->post->user_id);

        $this->dispatch('updateList');
    }

    public function likePost(): void
    {
        if (!auth()->check()) {
            redirect()->route('login');
            return;
        }

        $this->likeService->createLike(auth()->id(), $this->post->id);
    }

    public function unlikePost(): void
    {
        $this->likeService->deleteLike(auth()->id(), $this->post->id);
    }
}
