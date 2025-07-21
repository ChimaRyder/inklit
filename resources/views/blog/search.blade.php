@extends('components/layouts/blog/layout')

@section('main')
    <div class="px-35 py-10">
        <h1 class="text-2xl font-bold">Search Results for "{{ request('q') }}"</h1>
    </div>

    <div class="px-50 flex flex-col gap-10">
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
