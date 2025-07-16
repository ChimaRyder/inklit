@extends('components/layouts/blog/layout')

@section('main')
    <div class="px-20 py-10">
        <livewire:post :post="$post"/>
    </div>
@endsection
