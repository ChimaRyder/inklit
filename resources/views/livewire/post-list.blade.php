<div class="flex flex-col gap-8 ">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @forelse($posts as $post)
       <livewire:post :post="$post" wire:key="post-{{ $post->id }}"/>
    @empty
        No Posts!
    @endforelse
</div>
