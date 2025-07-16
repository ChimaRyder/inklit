<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function is_liked() {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
}
