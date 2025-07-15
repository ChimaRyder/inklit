<div>
    <h1 class="text-4xl font-bold mb-3 text-center">Write A Blog</h1>
    <form class="flex flex-col gap-4" wire:submit="submit" method="POST">
        @csrf

        <fieldset class="fieldset w-full">
            <legend class="fieldset-legend">Blog Title</legend>
            <input type="text" class="input input-lg w-full" placeholder="Title" wire:model="title" wire:keydown.debounce.200ms="enableSubmit"/>
        </fieldset>


        <fieldset class="fieldset w-full">
            <legend class="fieldset-legend">Blog Content</legend>
            <textarea class="textarea textarea-md w-full h-150" placeholder="What are you thinking about?" wire:model="body" wire:keydown.debounce.200ms="enableSubmit"></textarea>
        </fieldset>

        <button class="btn btn-lg bg-amber-700 text-white" @disabled(!$canSubmit) type="submit">Post Your Blog</button>
    </form>
</div>
