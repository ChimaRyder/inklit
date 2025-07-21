<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/search',  [BlogController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {

    Route::get('/feed', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/write', [DashboardController::class, 'write'])->name('write');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/posts', [DashboardController::class, 'posts'])->name('posts');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    Route::get('/p/{id}/edit', [DashboardController::class, 'edit'])->name('edit');
});

Route::get('/p/{id}', [PostController::class, 'index'])->name('post');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin-users');
    Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin-posts');
    Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin-comments');

    Route::redirect('/admin', '/admin/posts');
});

require __DIR__.'/auth.php';
