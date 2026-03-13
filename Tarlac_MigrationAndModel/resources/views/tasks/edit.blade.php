<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
        .btn { padding: 10px 15px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; border: none; cursor: pointer; }
        .btn-primary { background-color: #28a745; }
        .btn-secondary { background-color: #6c757d; margin-left: 10px; }
        .error { color: red; font-size: 0.9em; margin-top: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Task: {{ $task->title }}</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf 
        @method('PUT') 

        <div class="form-group">
            <label for="title">Task Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group checkbox-group">
            <input type="hidden" name="is_completed" value="0">
            <input type="checkbox" name="is_completed" id="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed" style="margin-bottom: 0;">Mark as Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>