<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Task;

class CreateTaskAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateTaskRequest $request)
    {
        $task = new Task();
        
        //バリデーションを行った値のみ取得
        $task->name = $request->validated()['name'];
        $task->save();

        return response()->json(['id' => $task->id, 'name' => $task->name], 201);
    }
}
