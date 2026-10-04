<?php

use App\Models\Todo;
use App\Models\User;

it('Todo 一覧が表示される', function () {
    Todo::factory()->create(['title' => '企画書を書く']);
    $this->get(route('todos.index'))
        ->assertOk()
        ->assertSee('企画書を書く');
});
it('他人の Todo は編集画面を開けない', function () {
    $todo = Todo::factory()->create();
    $other = User::factory()->create();
    $this->actingAs($other)
        ->get(route('todos.edit', $todo))
        ->assertForbidden();
});
