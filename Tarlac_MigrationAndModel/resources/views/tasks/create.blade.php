<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-pink-200 p-10 font-sans text-gray-800">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf 

        <div class="mb-4">
            <label for="title" class="block font-bold mb-2">Task Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-pink-400 focus:ring-1 focus:ring-pink-400">
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block font-bold mb-2">Description (Optional)</label>
            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-pink-400 focus:ring-1 focus:ring-pink-400">{{ old('description') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>