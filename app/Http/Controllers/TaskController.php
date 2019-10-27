<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = \App\Task::all();
        return view('task.index', ['tasks' => $tasks]);
        // return (array(view('card.index')->with('tasks',$tasks), 'tasks' => $tasks));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $model)
    {
        $model->create($request->all());

        return redirect()->route('board/card/{id}')->withStatus(__('Task successfully created.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        if (auth()->id() != $task->card->board->user_id) {
            return response(null, 404);
        }
        return new TaskResource($task);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
    public function updateOrder(Request $request)
    {
        $tasks = collect(request('items'));
        // Loop over each task and update order_key column to be the array
        // index from the posted data
        $tasks->each(function($task_data, $key) {
            $task = Task::find($task_data['id']);
            // Validate task belongs to us
            if (auth()->id() != $task->card->board->user_id) {
                return;
            }
            // Update order_key and save
            $task->order_key = $key;
            $task->save();
        });
        return response()->json(['data' => ['success' => true]]);
    }
}
