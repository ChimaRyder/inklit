<?php

namespace App\Livewire;

use App\Http\Services\CommentService;
use Livewire\Component;

class CommentsTable extends Component
{
    private CommentService $commentService;

    public function boot(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function render()
    {
        $comments = $this->commentService->getAllComments();

        return view('livewire.comments-table',  compact('comments'));
    }

    public function deleteComment($commentId) {
        $this->commentService->deleteComment($commentId);
    }
}
