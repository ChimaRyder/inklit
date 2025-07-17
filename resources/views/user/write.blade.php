@extends('user/partial/dashboard')

@section('dashboard-main')
    <livewire:post-form heading="Write A Blog" submitButton="Post Your Blog" submitFunction="submit"/>
@endsection
