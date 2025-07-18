@extends('user/partial/dashboard')

@section('dashboard-main')
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold p-6 pl-0">My Posts</h1>

        <livewire:posts-search-bar/>
    </div>

    <livewire:post-list/>
@endsection
