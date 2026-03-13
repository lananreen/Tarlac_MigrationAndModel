<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #fdc9e2; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #fdc9e2; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; }
        .btn-primary { background-color: #fdc9e2; }
        .alert { color: #ffffff; background-color: #fdc9e2; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
        .completed { text-decoration: line-through; color: #888; }
        .actions { display: flex; gap: 10px; align-items: center; }
    </style>
</head>
<body>

<div class="container">
    <h1>My Tasks</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Create New Task</a>

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
                        <a href="{{ route('tasks.edit', $task) }}" style="color: #007bff; text-decoration: none;">Edit</a> 
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; background: none; border: none; cursor: pointer; font-size: 16px;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px; color: #666;">
                        No tasks found. Try adding one!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>