<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title> 
    @vite(['resources/css/app.css'])
</head>
<body class="bg-pink-200 p-10 font-sans text-gray-800">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6">My Tasks</h1>

    @if(session('success'))
        <div class="bg-pink-300 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="bg-pink-300 hover:bg-pink-400 text-white font-bold py-2 px-4 rounded inline-block mb-6 transition">
        + Create New Task
    </a>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-pink-200 p-3 text-left">ID</th>
                <th class="border border-pink-200 p-3 text-left">Title</th>
                <th class="border border-pink-200 p-3 text-left">Description</th>
                <th class="border border-pink-200 p-3 text-left">Status</th>
                <th class="border border-pink-200 p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="hover:bg-gray-50">
                    <td class="border border-pink-200 p-3">{{ $task->id }}</td>
                    <td class="border border-pink-200 p-3 {{ $task->is_completed ? 'line-through text-gray-400' : 'font-bold' }}">
                        {{ $task->title }}
                    </td>
                    <td class="border border-pink-200 p-3">{{ $task->description ?? 'No description' }}</td>
                    <td class="border border-pink-200 p-3">{{ $task->is_completed ? 'Done' : 'Pending' }}</td>
                    <td class="border border-pink-200 p-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a> 
                            
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="m-0" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold cursor-pointer">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border border-pink-200 p-8 text-center text-gray-500">
                        No tasks found. Try adding one!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>