<?php
    use Carbon\Carbon;
?>

<div class="p-10">
    <table class="table">
        <thead>
            <tr>
                <th>ID #</th>
                <th>User</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date Posted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($posts as $post)
               <tr>
                   <td>{{ $post->id }}</td>
                   <td>{{ $post->user->name }}</td>
                   <td>{{ $post->title }}</td>
                   <td>{{ strlen($post->body) > 20 ? substr($post->body, 0, 20) . "..." : $post->body  }}</td>
                   <td>{{ Carbon::parse($post->created_at)->format('F j, Y g:i A') }}</td>
                   <td class="flex gap-2">
                       <a href="{{ route('post', $post->id) }}" class="btn btn-sm">Read Post</a>
                       <button class="btn btn-sm btn-error" wire:click="deletePost({{ $post->id }}, {{ $post->user_id }})" wire:confirm="Are you sure you want to delete this post?">
                           <x-fas-trash-can class="w-4 h-4"/>
                       </button>
                   </td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>
