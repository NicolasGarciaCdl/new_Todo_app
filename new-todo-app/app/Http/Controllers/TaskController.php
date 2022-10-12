<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $newTask = new Task();
        $newTask->title = $request->task['title'];
        $newTask->save();
        return $newTask;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Task::find ($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $task->description = $request['description'];
        $task->title= $request['title'];
        $task->is_done= $request['is_done'];
        $task->save();

        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if($task){
            $task->completed = (bool)$request->task['completed'];
            $task->save();
            return $task;
        }
        return "Task not found!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if($task){
            $task->delete();
            return "Task deleted";
        }
        return "Task not found!";
    }
}
