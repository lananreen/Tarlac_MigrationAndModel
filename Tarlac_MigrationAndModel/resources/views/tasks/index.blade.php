<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    @vite(['resources/css/app.css'])
</head>
<body>

<div class="container">
    <h1>My Tasks ❤︎</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task .ᐟ</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td class="{{ $task->is_completed ? 'completed' : '' }}">
                        <strong>{{ $task->title }}</strong>
                    </td>
                    <td>{{ $task->description ?? 'No description' }}</td>
                    <td>{{ $task->is_completed ? 'Done' : 'Pending' }}</td>
                    <td class="actions">
                        <a href="{{ route('tasks.edit', $task) }}" class="edit-btn">Edit</a> 
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task? :CC');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        No tasks found. Try adding one!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>