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
        return view('user.feed');
    }

    public function write() {
        return view('user.write');
    }

    public function edit($id) {
        $post = $this->postService->getPost($id);

        return view('user.edit', compact('post'));
    }

    public function profile() {
        return redirect('/u/'. auth()->id());
    }

    public function posts() {
        return view('user.posts');
    }

    public function settings() {
        return view('user.settings');
    }
}
