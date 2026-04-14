<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $validatedData['is_completed'] = $request->has('is_completed');

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        if (Task::count() === 0) {
            $driver = DB::connection()->getDriverName();

            if ($driver === 'mysql' || $driver === 'mariadb') {
                DB::statement('ALTER TABLE tasks AUTO_INCREMENT = 1');
            } elseif ($driver === 'sqlite') {
                DB::statement("DELETE FROM sqlite_sequence WHERE name = 'tasks'");
            } elseif ($driver === 'pgsql') {
                DB::statement("ALTER SEQUENCE tasks_id_seq RESTART WITH 1");
            } elseif ($driver === 'sqlsrv') {
                DB::statement("DBCC CHECKIDENT ('tasks', RESEED, 0)");
            }
        }

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
