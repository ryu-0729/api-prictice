<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class GetTaskAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $id)
    {
        $task = Task::query()->findOrFail($id);

        return response()->json([
            'id' => $task->id,
            'name' => $task->name,
        ]);
    }
}
