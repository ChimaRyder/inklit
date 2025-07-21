<div class="flex flex-col justify-center max-h-screen">
    <div class="flex flex-col gap-8 overflow-y-scroll w-full">
        @forelse($posts as $post)
            <livewire:post :post="$post" wire:key="post-{{ $post->id }}"/>
        @empty
            <x-post.no-posts subtitle="You're all caught up."/>
        @endforelse
    </div>

    <div class="pt-3">
        {{ $posts->links() }}
    </div>
</div>
