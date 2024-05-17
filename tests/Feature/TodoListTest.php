<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_todo_list()
    {
        Session::start();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('todos', []);
    }

    /** @test */
    public function it_adds_an_item_to_the_todo_list()
    {
        Session::start();
        $response = $this->post('/todo', [
            'list' => 'Test Item',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect('/');
        $this->assertEquals(['Test Item'], session('todos'));
    }


    /** @test */
    public function it_clears_the_todo_list_after_5_minutes_of_inactivity()
    {
        Session::start();
        session(['todos' => ['Test Item'], 'last_activity' => now()->subMinutes(6)]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $this->assertEquals(null, session('todos'));
    }

    /** @test */
    public function it_does_not_clear_the_todo_list_within_5_minutes_of_inactivity()
    {
        Session::start();
        session(['todos' => ['Test Item'], 'last_activity' => now()->subMinutes(4)]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $this->assertEquals(['Test Item'], session('todos'));
    }

    /** @test */
    public function it_sets_the_clear_flag_on_page_unload()
    {
        Session::start();
        $response = $this->post('clear_flag', [
            '_token' => csrf_token(),
        ]);

        $response->assertStatus(204);
        $this->assertTrue(session()->has('clear_todos'));
        $this->assertFalse(session('clear_todos'));
    }
}
