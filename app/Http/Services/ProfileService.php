<?php

namespace App\Http\Services;

use App\Models\Comment;
use App\Models\User;

class ProfileService
{
    public function getProfile($id) {
        return User::findOrFail($id);
    }

    public function getProfileBySearch($search) {
        return User::where('name', 'LIKE', "%$search%")
            ->orderBy('name', 'desc')
            ->get();
    }

    public function getAllProfiles() {
        return User::orderBy('name', 'desc')->get();
    }
}
