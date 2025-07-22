<?php
namespace App\Http\Services;

use App\Models\Comment;

class CommentService {
    public function createComment($postId, $comment){
        if (!auth()->check()) {
            return redirect('login');
        }

        Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'comment' => $comment,
        ]);

        return true;
    }

    public function getAllComments(){
        return Comment::orderBy('created_at', 'desc')->get();
    }

    public function deleteComment($commentId){
        if (!auth()->check()) {
            return redirect('login');
        }

        if (auth()->user()->role !== 'admin') {
            return abort(403);
        }

        Comment::destroy($commentId);
    }
}
