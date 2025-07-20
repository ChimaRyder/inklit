<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', [BlogController::class, 'index'])->name('home');

//Route::view('dashboard', 'user/index')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
//    Route::redirect('/', '/feed')->name('dashboard');

    Route::get('/feed', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/write', [DashboardController::class, 'write'])->name('write');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/posts', [DashboardController::class, 'posts'])->name('posts');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    Route::get('/p/{id}/edit', [DashboardController::class, 'edit'])->name('edit');
});

Route::get('/p/{id}', [PostController::class, 'index'])->name('post');

//Route::middleware(['auth'])->group(function () {
//    Route::redirect('settings', 'settings/profile');
//
//    Route::get('settings/profile', Profile::class)->name('settings.profile');
//    Route::get('settings/password', Password::class)->name('settings.password');
//    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
//});

require __DIR__.'/auth.php';
