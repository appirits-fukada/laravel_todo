<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タスクの一覧') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div>タスク名:</div>
        <div class="text-3xl">{{ $task->title }}</div>
        <div class="pt-4">タスク詳細:</div>
        <div class="text-3xl">{{ $task->content }}</div>
    </div>
    <div class="flex space-x-4">
        <a class="items-center px-4 py-2 bg-transparent hover:bg-gray-500 text-gray-500 font-semibold hover:text-white border border-gray-500 hover:border-transparent rounded"
            href="{{ route('tasks.edit', ['task' => $task->id]) }}">編集</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" name="" value="削除"
                class="items-center px-4 py-2 bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white border border-red-500 hover:border-transparent rounded"
                onclick="return confirm('タスクを削除します(削除したら戻せません)。\nよろしいですか');">
        </form>
    </div>
    <hr class="py-4">
    <menu class="py-4" label="リンク">
        <a class="px-4" href="{{ route('tasks.index') }}">一覧画面に戻る</a><br>
    </menu>
</x-app-layout>
