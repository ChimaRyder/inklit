<?php

namespace App\Livewire;

use App\Http\Services\ProfileService;
use Livewire\Component;

class UsersTable extends Component
{
    private ProfileService $profileService;

    public function boot(ProfileService $profileService) {
        $this->profileService = $profileService;
    }

    public function render()
    {
        $users = $this->profileService->getAllProfiles();

        return view('livewire.users-table',  compact('users'));
    }
}
