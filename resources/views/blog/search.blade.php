@extends('components/layouts/blog/layout')

@section('main')
    <div class="px-35 py-10">
        <h1 class="text-2xl font-bold">Search Results for "{{ request('q') }}"</h1>
    </div>
@endsection
