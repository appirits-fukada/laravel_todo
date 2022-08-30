@extends('layout.application')

@section('content')
    <h1>タスク一覧</h1>
    <table border="1">
        <tr>
            <th>タスク名</th>
        </tr>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td><a href="{{ route('tasks.show', ['task' => $task->id]) }}">詳細</a></td>
                    <td><a href="#">編集</a></td>
                    <td><a href="#">削除</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <menu label="リンク">
        <a href="#">タスクの新規作成</a><br>
        <a href="#">ログアウト</a>
    </menu>
@endsection
