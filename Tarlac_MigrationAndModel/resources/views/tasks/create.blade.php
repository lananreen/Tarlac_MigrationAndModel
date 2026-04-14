<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-pink-50 text-gray-800 font-sans p-4 md:p-10">

<div class="max-w-2xl mx-auto bg-white p-6 md:p-8 rounded-xl shadow-lg border-t-4 border-pink-400">
    <h1 class="text-3xl font-extrabold text-pink-600 mb-6">Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf 

        <div class="mb-5">
            <label for="title" class="block mb-2 font-bold text-pink-800">Task Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full p-3 border border-pink-200 rounded-lg bg-pink-50 text-gray-800 transition duration-200 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent focus:bg-white" required>
            
            @error('title')
                <div class="text-red-500 text-sm mt-2 font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="description" class="block mb-2 font-bold text-pink-800">Description (Optional)</label>
            <textarea name="description" id="description" rows="4" class="w-full p-3 border border-pink-200 rounded-lg bg-pink-50 text-gray-800 transition duration-200 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent focus:bg-white">{{ old('description') }}</textarea>
        </div>

        <div class="mt-8 flex items-center">
            <button type="submit" class="inline-block font-bold py-2 px-5 rounded-lg shadow transition ease-in-out duration-200 transform hover:-translate-y-1 no-underline bg-pink-500 hover:bg-pink-600 text-white">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="inline-block font-bold py-2 px-5 rounded-lg shadow transition ease-in-out duration-200 transform hover:-translate-y-1 no-underline bg-gray-400 hover:bg-gray-500 text-white ml-3">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>