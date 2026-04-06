<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    @vite(['resources/css/app.css'])
</head>
<body>

<div class="container max-w-2xl">
    <h1>Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf 

        <div class="form-group">
            <label for="title" class="form-label">Task Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-input" required>
            
            @error('title')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" rows="4" class="form-input">{{ old('description') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>