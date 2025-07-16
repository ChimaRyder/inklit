<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService){
        $this->postService = $postService;
    }

    public function index()
    {
        return view('user.index');
    }

    public function write() {
        return view('user.write');
    }

    public function edit($id) {
        $post = $this->postService->getPost($id);

        return view('user.edit', compact('post'));
    }

    public function profile() {

    }

    public function posts() {
        return view('user.posts');
    }

    public function settings() {

    }
}
