<div class="px-30 py-10">
    <h1 class="font-bold text-3xl pb-4">Trending Blogs</h1>

    <div class="grid grid-cols-4 gap-5 h-max">
       @forelse($posts as $post)
           <x-blog.trending-post :post="$post"/>
        @empty
           No posts
       @endforelse

        <div class="flex flex-col gap-2 items-center justify-center">
            <h1 class="text-2xl font-bold">Write Your Own Blogs Now</h1>
            <a href="{{ route("write") }}" class="btn btn-lg w-full self-center bg-amber-700 text-white">Join</a>
        </div>
    </div>
</div>

