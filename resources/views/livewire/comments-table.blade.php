<?php
    use Carbon\Carbon;
?>

<div class="p-10">
    <table class="table">
        <thead>
            <tr>
                <th>ID #</th>
                <th>User</th>
                <th>Post</th>
                <th>Comment</th>
                <th>Date Commented</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($comments as $comment)
               <tr>
                   <td>{{ $comment->id }}</td>
                   <td>{{ $comment->user->name }}</td>
                   <td>{{ $comment->post->title }}</td>
                   <td>{{ strlen($comment->comment) > 20 ? substr($comment->comment, 0, 20) . "..." : $comment->comment  }}</td>
                   <td>{{ Carbon::parse($comment->created_at)->format('F j, Y g:i A') }}</td>
                   <td class="flex gap-2">
                       <a href="{{ route('post', $comment->post_id) }}" class="btn btn-sm">Read Post</a>
                       <button class="btn btn-sm btn-error" wire:click="deleteComment({{ $comment->id }})" wire:confirm="Are you sure you want to delete this comment?">
                           <x-fas-trash-can class="w-4 h-4"/>
                       </button>
                   </td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>
