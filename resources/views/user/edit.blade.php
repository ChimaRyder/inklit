@extends('user/index')

@section('dashboard-main')
    <livewire:post-form heading="Edit Blog" submitButton="Save Blog" submitFunction="editPost" :post="$post" />
@endsection

