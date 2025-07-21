<div class="flex flex-col justify-center max-h-screen">
   <div class="flex flex-col gap-8 overflow-y-scroll w-full" wire:loading.remove>
       @forelse($posts as $post)
           <livewire:post :post="$post" wire:key="post-{{ $post->id }}"/>
       @empty
           <x-post.no-posts subtitle="You have no posts yet."/>
       @endforelse
   </div>

    <div class="text-gray-400 text-center h-screen" wire:loading>
        <span class="loading loading-dots loading-xl"></span>
        <p class="text-sm">Searching posts...</p>
    </div>

    <div class="pt-3">
        {{ $posts->links() }}
    </div>
</div>

