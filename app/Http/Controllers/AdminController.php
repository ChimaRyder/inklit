<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function users(): View
    {
        return view('admin.users');
    }

    public function posts(): View {
        return view('admin.posts');
    }

    public function comments(): View
    {
        return view('admin.comments');
    }
}
