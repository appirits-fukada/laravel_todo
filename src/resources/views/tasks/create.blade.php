<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タスクの登録') }}
        </h2>
    </x-slot>

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
        <label class="block py-4">
            <span class="text-gray-700">タスク名</span>
            <input
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="string" name="title" value="{{ old('title') }}"></input>
        </label>
        <label class="block py-4">
            <span class="text-gray-700">タスク詳細</span>
            <textarea
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                rows="3" type="text" name="content" value="{{ old('content') }}"></textarea>
        </label>
        <input type="submit" name="" value="タスクを登録する"
                class="items-center px-4 py-2 bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
    </form>
    <hr class="py-4">
    <menu class="py-4" label="リンク">
        <a class="px-4" href="{{ route('tasks.index') }}">一覧画面に戻る</a><br>
    </menu>
</x-app-layout>
