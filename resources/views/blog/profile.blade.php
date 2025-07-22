@extends('components/layouts/blog/layout')

@section('main')
    <div class="flex flex-col items-center p-10">
        <livewire:profile :user="$user"/>

        <div class="min-w-1/2 py-10">
            <livewire:post-list user="{{ $user->id }}" subtitle="This user has no posts yet." />
        </div>
    </div>
@endsection
