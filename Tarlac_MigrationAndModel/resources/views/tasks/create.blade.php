<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #fdc9e2; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn { padding: 10px 15px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; border: none; cursor: pointer; }
        .btn-primary { background-color: #fdc9e2; }
        .btn-secondary { background-color: #6c757d; margin-left: 10px; }
        .error { color: red; font-size: 0.9em; margin-top: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf 

        <div class="form-group">
            <label for="title">Task Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description (Optional)</label>
            <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>