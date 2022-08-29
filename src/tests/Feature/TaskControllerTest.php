<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    /** @test */
    public function タスク一覧にアクセスして画面が表示される()
    {
        $response = $this->get(action('App\Http\Controllers\TaskController@index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function タスク一覧にアクセスしてタスク一覧画面が表示される()
    {
        $response = $this->get(action('App\Http\Controllers\TaskController@index'));
        $response->assertViewIs('tasks.index');
    }

    /** @test */
    public function タスク一覧にアクセスしてタスクが全件表示される()
    {
        // テスト用のデータを作成
        Task::factory()->count(30)->create();

        // 作成したデータが全件表示されていること
        //TODO ①テスト用DBが分けられてない。
        //TODO ②上記の"テスト用データを作成"では作成したテストデータがテスト後ロールバックされない。
        // ①②から、テスト実行のたびに開発用DBにレコードが溜まっちゃって30件以上あるのでREDになる。
        $response = $this->get(action('App\Http\Controllers\TaskController@index'));
        $tasks = $response->original['tasks'];
        $this->assertEquals(30, count($tasks));
    }
}
