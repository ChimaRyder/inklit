<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class PostsSearchBar extends Component
{
    public string $query;

    public function render()
    {
        return view('livewire.posts-search-bar');
    }

    public function submit()
    {
        $query = trim($this->query);

        $this->dispatch('searchPosts', $query);
    }
}
