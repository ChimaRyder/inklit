@extends('user/partial/dashboard')

@section('dashboard-main')
    <livewire:post-form heading="Edit Blog" submitButton="Save Blog" submitFunction="editPost" :post="$post" />
@endsection

