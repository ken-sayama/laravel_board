<?php

namespace Tests\Browser\Board;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/boards')
                    ->click('a')
                    ->assertPathIs('/boards/create')
                    // フォームの入力
                    ->type('title', 'タイトル1')
                    ->type('content', 'コンテンツ1')
                    ->press('送信')
                    // テストデータの確認
                    //->seePageIs('/boards')
                    ->assertPathIs('/boards')
                    ->assertSee('タイトル1')
                    ->assertSee('コンテンツ1');
        });
    }
}
