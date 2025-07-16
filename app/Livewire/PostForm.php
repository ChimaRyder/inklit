<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Http\Services\PostService;

class PostForm extends Component
{
    private PostService $postService;

    public string $title = "";
    public string $body = "";
    public bool $canSubmit = false;

    public function boot(PostService $postService): void {
        $this->postService = $postService;
    }

    public function render()
    {
        return view('livewire.post-form');
    }

    public function submit()
    {
        $validated_data = $this->validate();

        $this->postService->createPost($validated_data);

        return redirect()->route('posts');
    }

    public function enableSubmit() {
        $this->canSubmit = !empty($this->title) && !empty($this->body);
    }

    public function rules() {
        return [
            'title' => 'required|string|max:64',
            'body' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.max' => 'Title must not be greater than 64 characters',
            'body.required' => 'Content is required',
            'body.string' => 'Content must be a string',
        ];
    }
}
