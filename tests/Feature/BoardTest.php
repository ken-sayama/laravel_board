<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Board;

class BoardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex(){
        //テストデータが二つ存在するとする
        $first = factory(Board::class)->create();
        $second = factory(Board::class)->create();
        $first->save();
        $second->save();
        
        // 指定したURL
        $response = $this->get('/boards');
        // 正しいレスポンスが返却されること
        $response->assertStatus(200);
        // 正しいviewファイルが表示されていること
        $response->assertViewIs('boards.index');
        // 指定した文字列が含まれているか
        $response->assertSee('掲示板のテスト');
        
        // factoryを使ってランダムに生成した文字列のチェックを行う
        $response
            ->assertSee($first->title)
            ->assertSee($first->content);
        
        $response
            ->assertSee($second->title)
            ->assertSee($second->content);
    }
}
