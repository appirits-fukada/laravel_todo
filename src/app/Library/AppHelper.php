<?php

namespace App\Library;

use Illuminate\Support\Facades\Auth;

class AppHelper
{
    public static function is_current_user_task($task)
    {
        if($task->user_id == Auth::id()) {
            return;
        } else {
            //FIXME redirectされない
            redirect()->route('tasks.index')->with('error', '別ユーザーのタスクです。');
        }
    }
}
