<div>
    <form wire:submit.prevent wire:keydown="submit">
        <label class="input">
            <x-fas-search class="w-5 h-5 text-gray-400"/>
            <input wire:model="query" type="search" placeholder="Search in posts..." value="{{ $query }}">
        </label>
    </form>
</div>
