<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Http\Services\ProfileService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private PostService $postService;
    private ProfileService $profileService;
    public function __construct(PostService $postService,  ProfileService $profileService) {
        $this->postService = $postService;
        $this->profileService = $profileService;
    }

    public function index() {
        if (auth()->check()) {
            return redirect('feed');
        }

        $posts = $this->postService->getTrendingPosts();

        return view('blog/index', compact('posts'));
    }

    public function search() {
        $posts = $this->postService->getPostsBySearch(trim(request('q')));
        $users = $this->profileService->getProfileBySearch(trim(request('q')));

        return view('blog/search', ['search' => request('q'), 'posts' =>  $posts,  'users' => $users]);
    }

    public function profile($username) {
        $user = $this->profileService->getProfile($username);

        return view('blog/profile', compact('user'));
    }
}
