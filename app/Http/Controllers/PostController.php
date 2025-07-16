<?php

namespace App\Http\Controllers;
use App\Http\Services\PostService;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index($id)
    {
        $post = $this->postService->getPost($id);

        return view('post/index', compact('post'));
    }
}
