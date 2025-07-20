<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private PostService $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index() {
        $posts = $this->postService->getTrendingPosts();

        return view('blog/index', compact('posts'));
    }
}
