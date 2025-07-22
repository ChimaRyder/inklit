<?php
    use Carbon\Carbon;
?>

@extends('components/layouts/blog/layout')

@section('main')
    <div class="px-70 py-10">
        <h1 class="text-2xl font-bold">Search Results for "{{ request('q') }}"</h1>
    </div>

    @if($users->count())
        <div class="mx-85 bg-gray-100 p-5 rounded-lg mb-10">
            <h1 class="text-xl font-bold">Profiles</h1>

            <div class="flex flex-col gap-3 p-2">
                @foreach($users as $user)
                    <div class="flex items-center gap-2">
                        <x-fas-user class="w-8 h-8"/>
                        <div>
                            <a href="{{ route('user-profile', $user->id) }}" class="text-lg hover:underline hover:text-amber-700">{{ $user->name }}</a>
                            <p class="text-gray-500 text-sm">Joined {{ Carbon::parse($user->created_at)->format('F Y')  }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="px-85 flex flex-col gap-10">
        @forelse($posts as $post)
            <livewire:post :post="$post"/>
        @empty
            <x-post.no-posts subtitle="Try adjusting your search."/>
        @endforelse
    </div>

    <div class="px-50 pt-3">
        {{ $posts->links() }}
    </div>
@endsection
