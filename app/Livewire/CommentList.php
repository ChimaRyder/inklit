<?php

namespace App\Livewire;

use App\Http\Services\CommentService;
use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentList extends Component
{
    private CommentService $commentService;

    public $post;

    public $comment;

    public $canSubmit;

    public function boot(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function render()
    {
        return view('livewire.comment-list');
    }

    public function canSubmitComment()
    {
        $this->canSubmit = !empty($this->comment);
    }
    public function submitComment()
    {
        $this->commentService->createComment($this->post->id, $this->comment);

        $this->reset('comment');
    }
}
