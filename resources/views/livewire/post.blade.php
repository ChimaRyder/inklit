<?php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Route;
?>

<div>
    <div class="w-full min-h-fit p-8 bg-gray-100 rounded-lg flex flex-col gap-4" wire:key="post-{{ $post->id }}">
        <div class="flex justify-between items-start">
            <div class="flex flex-col gap-1">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                <a href="{{ route('post', $this->post->id) }}" class="text-sm text-gray-500 hover:underline">{{ Carbon::parse($post->created_at)->diffForHumans() }} by {{ $post->user->name }}</a>
            </div>

            @if(auth()->hasUser())
                @if($post->user_id === auth()->user()->id)
                    <div class="dropdown dropdown-bottom dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost"><x-fas-ellipsis-vertical class="w-5 h-5"/></div>
                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                            <li><a href="{{ route('edit', $post->id) }}"><x-fas-edit class="w-4 h-4"/> Edit</a></li>
                            <li><a wire:click="deletePost({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?"><x-fas-trash-can class="w-4 h-4"/> Delete</a></li>
                        </ul>
                    </div>
                @endif
            @endif
        </div>

        <p>
            {{ $post->body }}
        </p>

        <div>
            <div class="divider"></div>

            <div class="flex gap-2">
                <button wire:click="{{ $post->is_liked() ? "unlikePost" : "likePost" }}" class="flex-1 btn btn-ghost {{ $post->is_liked() ? "bg-amber-700 text-white" : "" }}">
                    @if(!$post->is_liked())
                        <x-far-circle-up class="w-5 h-5"/>
                    @else
                        <x-fas-circle-up class="w-5 h-5"/>
                    @endif
                    Upvote ({{ $post->likes->count() }})
                </button>
                <a href="{{ route('post', $post->id) }}" class="flex-1 btn btn-ghost"><x-fas-comment class="w-5 h-5"/>Comments ({{ $post->comments->count() }})</a>

            </div>
        </div>

        @if(Route::currentRouteName() === "post")
            <livewire:comment-list :post="$post"/>
        @endif
    </div>
</div>
