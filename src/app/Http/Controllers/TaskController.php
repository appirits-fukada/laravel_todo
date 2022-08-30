<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\StoreTask;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTask $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->save();
        //TODO flashメッセージは別ファイルで設定できないか？
        return redirect()->route('tasks.index')->with('success', '新規タスクを作成しました。');
    }

    /** */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
