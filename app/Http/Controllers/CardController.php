<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Board;
use App\Http\Resources\CardResource;

class CardController extends Controller
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
        $allcards = Card::all();

        return view('card.index', compact('allcards'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $board = \App\Board::where('id', $id)->get();
        return view('card.create', compact('board'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Card $model)
    {
        $model->create($request->all());

        return redirect()->back()->withStatus(__('Card successfully created.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        if (auth()->id() != $card->board->user_id) {
            return response(null, 404);
        }
        return new CardResource($card);
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
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Card $card)
    {
        $this->validate(request(), [
            'id' => 'required',
            'name' => 'required'
        ]);
        $card->name = request('name');
        $card->save();
        return new CardResource($card);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();

        return redirect()->back();
    }
}
