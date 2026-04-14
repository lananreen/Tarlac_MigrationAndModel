<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-pink-50 text-gray-800 font-sans p-4 md:p-10">

<div class="max-w-5xl mx-auto bg-white p-6 md:p-8 rounded-xl shadow-lg border-t-4 border-pink-400">
    <h1 class="text-3xl font-extrabold text-pink-600 mb-6">My Tasks ❤︎</h1>

    @if(session('success'))
        <div class="bg-pink-100 text-pink-800 p-4 rounded-lg mb-6 font-semibold border border-pink-300">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="inline-block font-bold py-2 px-5 mb-4 rounded-lg shadow transition ease-in-out duration-200 transform hover:-translate-y-1 no-underline bg-pink-500 hover:bg-pink-600 text-white">Create New Task .ᐟ</a>

    <table class="min-w-full bg-white mt-4 border-collapse">
        <thead class="bg-pink-100">
            <tr>
                <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">ID</th>
                <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Title</th>
                <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Description</th>
                <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Status</th>
                <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="hover:bg-pink-50 transition duration-150">
                    <td class="py-4 px-4 border-b border-pink-50 text-gray-700">{{ $task->id }}</td>
                    <td class="py-4 px-4 border-b border-pink-50 text-gray-700">
                        <strong class="{{ $task->is_completed ? 'line-through text-gray-400 font-normal' : '' }}">{{ $task->title }}</strong>
                    </td>
                    <td class="py-4 px-4 border-b border-pink-50 text-gray-700">{{ $task->description ?? 'No description' }}</td>
                    <td class="py-4 px-4 border-b border-pink-50 text-gray-700">{{ $task->is_completed ? 'Done' : 'Pending' }}</td>
                    <td class="py-4 px-4 border-b border-pink-50 text-gray-700 flex space-x-3 items-center">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:text-blue-700 font-semibold transition no-underline">Edit</a> 
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task? :CC');" class="m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold bg-transparent border-none cursor-pointer text-base transition p-0">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-10 px-4 text-center text-pink-400 italic border-b border-pink-50">
                        No tasks found. Try adding one!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>