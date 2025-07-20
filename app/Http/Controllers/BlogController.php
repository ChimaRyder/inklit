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
        if (auth()->check()) {
            return redirect('feed');
        }

        $posts = $this->postService->getTrendingPosts();

        return view('blog/index', compact('posts'));
    }

    public function search() {
        $this->postService->getPostsBySearch(trim(request('q')));

        return view('blog/search', ['search' => request('q')]);
    }
}
