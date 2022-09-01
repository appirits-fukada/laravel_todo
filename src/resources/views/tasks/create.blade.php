@extends('layouts.application')

@section('content')
    <h1>タスクの登録</h1>
    <!--TODO メッセージはパーシャルにする -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
        タスク名:<input type="string" name="title" value="{{ old('title') }}"><br>
        タスク詳細:<textarea type="string" name="content" value="{{ old('content') }}"></textarea><br>
        <button type="submit">タスクを登録する</button>
    </form>
    <hr>
    <menu label="リンク">
        <a href="{{ route('tasks.index') }}">一覧画面に戻る</a><br>
        <a href="#">ログアウト</a><br>
    </menu>
@endsection
