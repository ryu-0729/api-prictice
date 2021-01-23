<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostTask()
    {
        $name = 'new task';

        $response = $this->postJson('/api/tasks', [
            'name' => $name,
        ]);

        $id = $response->json(['id']);

        $response->assertStatus(201);
        $response->assertJson([
            'id' => $id,
            'name' => $name,
        ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $id,
            'name' => $name,
        ]);
    }
}
