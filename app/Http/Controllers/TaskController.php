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
        $total = \App\Task::count();
        return view('task.index', compact('total','tasks'));
        // return (array(view('card.index')->with('tasks',$tasks), 'tasks' => $tasks));
    }
    public function progress()
    {
        $count = Task::where(['is_done' => 1])->get()->count();

        return View::make('task.index')->with('count', $count);
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

        return redirect()->back()->withStatus(__('Task successfully created.'));
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
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }
    public function done(Request $request, $id)
    {
        $task = Task::find($id);
        $task->is_done = 1;
        $task->save();
        return redirect()->back();
    }
}
