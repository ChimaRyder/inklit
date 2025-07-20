<?php
    use Carbon\Carbon
?>
<div class="min-h-70 bg-gray-200 rounded-lg p-4 flex flex-col justify-between gap-4">
    <div class="flex flex-col gap-4">
        <div>
            <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500">{{ Carbon::parse($post->created_at)->diffForHumans() }} by {{ $post->user->name }}</p>
        </div>

        <p>
            {{ strlen($post->body) >= 20 ? substr($post->body, 0, 20) . "..." : $post->body }}
        </p>
    </div>

    <div class="flex justify-between items-center text-sm text-gray-500">
        <div class="flex items-center gap-2">
            <x-far-circle-up class="w-4 h-4 text-amber-700"/>
            {{ $post->likes->count() }}
            <x-fas-comment class="w-4 h-4 text-amber-700"/>
            {{ $post->comments->count() }}
        </div>
        <a class="underline hover:text-amber-700 ani" href="{{ route('post', $post->id) }}">Read More</a>
    </div>
</div>
