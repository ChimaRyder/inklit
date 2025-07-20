@extends('components/layouts/blog/layout')

@section('main')

    {{--Jumbotron--}}
    @include('blog/partial/jumbotron')

    {{--Trending Posts--}}
    @include('blog/partial/trending')

    {{--Footer--}}
    @include('blog/partial/footer')

@endsection
