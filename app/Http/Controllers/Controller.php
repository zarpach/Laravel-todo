<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Routing\Controller;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store() {

    }

    public function show($id) {

    }

    public function edit($id) {

    }

    public function update($id) {

    }
}
