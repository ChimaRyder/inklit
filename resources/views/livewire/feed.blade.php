<div class="flex flex-col gap-8 h-screen overflow-y-scroll">
    @forelse($posts as $post)
        <livewire:post :post="$post" wire:key="post-{{ $post->id }}"/>
    @empty
        <x-post.no-posts subtitle="You're all caught up."/>
    @endforelse
</div>
