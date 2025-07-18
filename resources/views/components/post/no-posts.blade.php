<div class="flex flex-col justify-center items-center gap-2 h-200">
    <x-fas-file-lines class="w-10 h-10 text-gray-400"/>
    <h1 class="text-2xl font-bold text-gray-400">No Posts Here!</h1>
    @if(!empty($subtitle))
        <p class="text-sm text-gray-400">{{ $subtitle }}</p>
    @endif
</div>
