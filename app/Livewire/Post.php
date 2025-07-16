<?php

namespace App\Livewire;

use App\Http\Services\LikeService;
use App\Models\Like;
use Carbon\Carbon;
use Livewire\Component;

class Post extends Component
{
    private LikeService $likeService;

    public $post;
    public string $date;

    public function boot(LikeService $likeService)
    {
        $this->likeService = $likeService;

    }

    public function render()
    {
        return view('livewire.post');
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
