<?php

namespace App\Livewire;

use Livewire\Component;

class GlobalSearchBar extends Component
{
    public $search;

    public function mount() {
        $this->search = request('q');
    }

    public function render()
    {
        return view('livewire.global-search-bar');
    }

    public function submit() {
        if (empty($this->search)) {
            return 0;
        }

        return redirect()->route('search', ['q' => $this->search]);
    }
}
