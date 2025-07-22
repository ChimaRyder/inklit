<?php
    use Carbon\Carbon;
?>

<div class="max-w-1/2 min-h-70 bg-gray-100 rounded-lg overflow-clip flex flex-col gap-2">
    <div class="w-full h-60 overflow-clip flex items-center">
        <img src="{{ asset('art-lasovsky-8XddFc6NkBY-unsplash.jpg') }}" alt="banner">
    </div>

    <div class="flex flex-row items-end gap-2 p-5">
        <x-fas-user class="w-12 h-12"/>
        <div>
            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
            <p class="text-sm text-gray-500">Joined on {{ Carbon::parse($user->created_at)->format('F Y') }}</p>
        </div>
    </div>

</div>
