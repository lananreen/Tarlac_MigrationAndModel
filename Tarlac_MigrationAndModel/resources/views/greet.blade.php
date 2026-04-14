<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-50 text-gray-800 font-sans p-4 md:p-10 flex items-center justify-center min-h-screen">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border-t-4 border-pink-400 text-center">
        
        <h1 class="text-3xl font-extrabold text-pink-600 mb-4">Welcome to the Greet View .ᐟ.ᐟ</h1>
        
        <p class="text-lg text-gray-700 mb-8">This page is from the previous greet activity in CIT18 (˶ᵔ ᵕ ᵔ˶)</p>

        <a href="/tasks" class="inline-block font-bold py-3 px-6 rounded-lg shadow transition ease-in-out duration-200 transform hover:-translate-y-1 no-underline bg-pink-500 hover:bg-pink-600 text-white">
            Go to My Tasks
        </a>
        
    </div>

</body>
</html>