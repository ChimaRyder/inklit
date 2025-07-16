<?php
namespace App\Http\Services;

use App\Models\Like;

class LikeService {
    public function createLike($user_id, $post_id) {
        Like::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
        ]);
    }

    public function deleteLike($user_id, $post_id) {
        Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
    }
}
