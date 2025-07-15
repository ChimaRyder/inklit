<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function write() {
        return view('user.write');
    }

    public function profile() {

    }

    public function posts() {
        return view('user.posts');
    }

    public function settings() {

    }
}
