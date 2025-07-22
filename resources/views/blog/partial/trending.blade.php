<div class="px-30 py-10">
    <h1 class="font-bold text-3xl pb-4">Trending Blogs</h1>

    <div class="grid grid-cols-4 gap-5 h-max">
       @foreach($posts as $post)
           <x-blog.trending-post :post="$post"/>
        @endforeach

        <div class="flex flex-col gap-2 items-center justify-center min-h-70 col-span-{{ 4 - ($posts->count() % 4) }} -col-end-1">
            <h1 class="text-2xl font-bold">Write Your Own Blogs Now</h1>
            <a href="{{ route("write") }}" class="btn btn-lg w-1/4 self-center bg-amber-700 text-white">Join</a>
        </div>
    </div>
</div>

