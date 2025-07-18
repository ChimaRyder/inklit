<div>
   <div class="flex flex-col gap-8 h-200 overflow-y-scroll" wire:loading.remove>
       @forelse($posts as $post)
           <livewire:post :post="$post" wire:key="post-{{ $post->id }}"/>
       @empty
           <x-post.no-posts subtitle="You have no posts yet."/>
       @endforelse
   </div>

    <div class="text-gray-400" wire:loading>
        <span class="loading loading-dots loading-xl text-center"></span>
        <p class="text-sm">Searching posts...</p>
    </div>
</div>
