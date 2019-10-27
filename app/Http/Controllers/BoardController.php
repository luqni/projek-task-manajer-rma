<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Task;
use Auth;
use App\Http\Resources\BoardResource;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $boards = Auth::user()->id;
        // $boards = \App\Board::all();
        // $boards = auth()->user()->id;
        $boards = \App\Board::all();
        return view('board.index', ['boards' => $boards]);
    }

    public function getTask()
    {
        $tasks = \App\Task::all();
        return view('task.index', ['tasks'=>$tasks]);
    }

    public function create()
    {
        return view('board.create');
    }

    public function showById($id)
    {
        $board = \App\Board::where('id', $id)->get();
        $tasks = \App\Task::all();
        // return view('card.index', ['board' => $board]);
        return view('card.index', compact('board','tasks')); 
    }


    // public function board()
    // {
        
    //     return view('board.create', ['cards' => $cards]);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $model)
    {
        $model->create($request->all());

        return redirect()->route('board')->withStatus(__('Board successfully created.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $board = Board::find($id);
        if (request()->wantsJson()) {
            return new BoardResource($board);
        }
        return view('board.show', compact('board'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $board = Board::find($id);

        // $board = \App\Board::where('id', $id)->delete();

        $board->delete();

        return redirect()->route('board')->withStatus(__('Board successfully deleted.'));
    }
}
