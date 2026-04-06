<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    @vite(['resources/css/app.css'])
</head>
<body>

<div class="container max-w-2xl">
    <h1>Edit Task: {{ $task->title }}</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf 
        @method('PUT') 

        <div class="form-group">
            <label for="title" class="form-label">Task Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="form-input" required>
            
            @error('title')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-input">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-checkbox-group">
            <input type="hidden" name="is_completed" value="0">
            <input type="checkbox" name="is_completed" id="is_completed" value="1" class="form-checkbox" {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed" class="form-checkbox-label">Mark as Completed</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>