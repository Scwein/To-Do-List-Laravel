<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function index()
    {
        return view('index', ['title_list' => 'List of tasks:', 'title' => 'Home'])->with('tasks', Task::get()->toArray());
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Поле обязательно для заполнения',
            'min' => 'Минимальная длина 6 символов'
        ];

        $request->validate([
            'task' => 'required|min:6'
        ], $messages);
        
        $task = new Task([
            'task_desc' => $request->input('task'),
        ]);
        $task->save();

        return redirect('/');
    }

    public function destroy()
    {
        Task::truncate();
        return redirect('/');
    }
}