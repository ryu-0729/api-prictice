<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Task;

class GetTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTask()
    {
        $task = factory(Task::class)->create();

        $response = $this->get('/api/tasks/' . $task->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $task->id,
                'name' => $task->name,
            ]);
    }
}
