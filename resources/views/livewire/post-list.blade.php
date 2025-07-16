<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @forelse($posts as $post)
       <livewire:post :post="$post"/>
    @empty
        No Posts!
    @endforelse
</div>
