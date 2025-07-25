<?php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Route
?>

<div class="flex flex-col gap-2">
    <h3 class="text-lg font-semibold">{{ $post->comments->count() }} {{ $post->comments->count() == 1 ? "Comment" : "Comments" }}</h3>
    @if(auth()->check())
        <form wire:submit="submitComment" class="flex gap-2 items-center">
            <x-fas-user class="w-8 h-8"/>
            <input type="text" class="input w-full" placeholder="Add a comment..." wire:model="comment" wire:keydown="canSubmitComment"/>
            <button class="btn bg-amber-700 text-white" {{ !$canSubmit ? "disabled" : "" }}>Comment</button>
        </form>
    @else
        <div class="flex gap-2 items-center">
            <x-fas-user class="w-8 h-8"/>
            <a href="{{ route('login') }}" class="btn bg-amber-700 text-white w-40">Login</a>
            <p class="text-gray-500">or</p>
            <a href="{{ route('register') }}" class="btn bg-amber-700 text-white w-40">Register</a>
        </div>
    @endif


    <div>
        @forelse($post->comments as $comment)
            <div class="flex gap-2 items-start my-3" wire:key="comment-{{ $comment->id }}">
                <x-fas-user class="w-8 h-8"/>
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col bg-gray-200 p-3 rounded-lg">
                        <p class="text-sm font-bold">{{ $comment->user->name }} <span class="text-sm text-gray-500 font-normal">{{ Carbon::parse($comment->created_at)->diffForHumans(null, true, true) }}</span> </p>
                        <p>{{ $comment->comment }}</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="btn btn-sm btn-ghost flex-1">Upvote</button>
                        <button class="btn btn-sm btn-ghost flex-1">Reply</button>
                    </div>
                </div>
            </div>
        @empty
            <x-post.no-comments/>
        @endforelse
    </div>
</div>
