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
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', '新規タスクを作成しました。');
    }

    /** */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(StoreTask$request, $id)
    {
        $update = [
            'title' => $request->title,
            'content'=> $request->content,
        ];
        Task::where('id', $id)->update($update);
        return redirect()->route('tasks.show', ['task' => $id])->with('success', 'タスクを編集しました。');
    }

    public function destroy()
    {
        //
    }
}
