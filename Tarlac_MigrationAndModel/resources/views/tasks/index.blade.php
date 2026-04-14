<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-pink-50 text-gray-800 font-sans p-4 md:p-10">
    
    <div class="max-w-5xl mx-auto bg-white p-6 md:p-8 rounded-xl shadow-lg border-t-4 border-pink-400">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-pink-600">My Tasks</h1>
            
            <a href="/tasks/create" class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-5 rounded-lg shadow transition ease-in-out duration-200 transform hover:-translate-y-1">
                + Create New Task
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-pink-100">
            <table class="min-w-full bg-white">
                <thead class="bg-pink-100">
                    <tr>
                        <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">ID</th>
                        <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Title</th>
                        <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Description</th>
                        <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Status</th>
                        <th class="py-3 px-4 border-b border-pink-200 text-left font-bold text-pink-800 uppercase text-sm tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    
                    {{-- This assumes your controller is passing a $tasks variable --}}
                    @forelse($tasks as $task)
                    <tr class="hover:bg-pink-50 transition duration-150">
                        <td class="py-4 px-4 text-pink-600 font-semibold">{{ $task->id }}</td>
                        <td class="py-4 px-4 font-bold text-gray-800">{{ $task->title }}</td>
                        <td class="py-4 px-4 text-gray-600 truncate max-w-xs">{{ $task->description }}</td>
                        <td class="py-4 px-4">
                            <span class="bg-pink-200 text-pink-800 py-1 px-3 rounded-full text-xs font-bold border border-pink-300">
                                {{ $task->status ?? 'Pending' }}
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex space-x-3">
                                <a href="/tasks/{{ $task->id }}/edit" class="text-pink-500 hover:text-pink-700 font-semibold transition">Edit</a>
                                
                                {{-- Delete Form --}}
                                <form action="/tasks/{{ $task->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold transition" onclick="return confirm('Are you sure you want to delete this task?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 px-4 text-center text-pink-400 italic">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 mb-3 text-pink-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                No tasks found. Time to add your first one!
                            </div>
                        </td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>