<?php

namespace App\Livewire;

use App\Http\Services\LikeService;
use App\Http\Services\PostService;
use App\Models\Like;
use Carbon\Carbon;
use Livewire\Component;

class Post extends Component
{
    private LikeService $likeService;
    private PostService $postService;

    public $post;
    public string $date;

    public function boot(LikeService $likeService, PostService $postService)
    {
        $this->likeService = $likeService;
        $this->postService = $postService;

    }

    public function render()
    {
        return view('livewire.post');
    }

    public function deletePost($id)
    {
        $this->postService->deletePost($id);

        $this->dispatch('updateList', $id);
    }

    public function likePost()
    {
        if (!auth()->hasUser()) {
            return redirect()->route('login');
        }

        $this->likeService->createLike(auth()->id(), $this->post->id);
    }

    public function unlikePost()
    {
        $this->likeService->deleteLike(auth()->id(), $this->post->id);
    }
}
