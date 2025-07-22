<?php
    use Carbon\Carbon;
?>

<div class="p-10">
    <table class="table">
        <thead>
            <tr>
                <th>ID #</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($users as $user)
               <tr>
                   <td>{{ $user->id }}</td>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->role }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ Carbon::parse($user->created_at)->format('F j, Y g:i A') }}</td>
                   <td class="flex gap-2">

                   </td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>
