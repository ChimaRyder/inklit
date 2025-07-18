<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentList extends Component
{
    public $post;

    public $comment;

    public $canSubmit;

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
        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ]);

        $this->reset('comment');
    }
}
