<div class="flex flex-col gap-8 h-screen overflow-y-scroll">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @forelse($posts as $post)
       <livewire:post :post="$post" wire:key="post-{{ $post->id }}"/>
    @empty
        <x-post.no-posts subtitle="You have no posts yet."/>
    @endforelse
</div>
