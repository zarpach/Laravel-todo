<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request) {
        $task = new Task();
        $task->name = $request->name;
        $task->status = $request->status;
        $task->description = $request->description;
        $task->save();

        return response()->json([
            'message' => 'Task created!'
        ], 201);
    }

    public function show($id) {
        $task = Task::find($id);

        if (!empty($task)) {
            return response()->json($task);
        }

        return response()->json([
            'message' => 'Task not found!'
        ], 404);
    }

    public function update(Request $request, $id) {
        $task = Task::find($id);
        if (!empty($task)) {
            $task->name = is_null($request->name) ? $task->name : $request->name;
            $task->status = is_null($request->status) ? $task->status : $request->status;
            $task->description = is_null($request->description) ? $task->description : $request->description;
            $task->save();

            return response()->json([
                'message' => 'Task updated!'
            ]);
        }

        return response()->json([
            'message' => 'Task not found!'
        ], 404);
    }

    public function destroy($id) {
        $task = Task::find($id);
        if (!empty($task)) {
            $task->delete();
            return response()->json([
                'message' => 'Task deleted!'
            ], 202);
        }
        return response()->json([
            'message' => 'Task not found!'
        ], 404);
    }
}
