<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|min:6|max:255'
        ]);

        return Task::create([
            'task_desc' => $validated['task'],
        ]);
    }

    public function show(string $id)
    {
        return Task::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'task' => 'required|min:6|max:255'
        ]);

        $task->update([
            'task_desc' => $validated['task'],
        ]);

        return $task;

    }

    public function destroy(string $id)
    {
        return Task::findOrFail($id)->delete();
    }
}
