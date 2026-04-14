<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'status' => 200,
            'message' => $tasks->isNotEmpty() ? 'Success' : 'No tasks found',
            'data' => $tasks,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|min:6|max:255',
        ]);

        $task = Task::create([
            'task_desc' => $validated['task'],
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'Task created successfully',
            'data' => $task,
        ], 201);
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $task,
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'task' => 'required|min:6|max:255',
        ]);

        $task->update([
            'task_desc' => $validated['task'],
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Task was updated successfully',
            'data' => $task,
        ], 200);
    }

    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Task deleted successfully',
            'data' => null,
        ], 200);
    }
}
