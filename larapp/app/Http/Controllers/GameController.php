<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\GameRequest;
use Auth;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $games = Game::paginate(20);
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('games.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $game = new Game;
        $game->name = $request->name;
        if ($request->hasFile('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $game->image = 'imgs/' . $file;
        }
        $game->description = $request->description;
        $game->user_id     = Auth::user()->id;
        $game->category_id = $request->category_id;
        $game->slider      = $request->slider;
        $game->price       = $request->price;

        if ($game->save()) {
            return redirect('games')->with('message', 'The Game: ' . $game->name . ' was successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('games.edit')->with('categories', $categories)
                                 ->with('game', $game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, Game $game)
    {
        $game->name  = $request->name;
        if ($request->hasFile('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $game->image = 'imgs/' . $file;
        }
        $game->description = $request->description;
        $game->category_id = $request->category_id;
        $game->slider      = $request->slider;
        $game->price       = $request->price;

        if ($game->save()) {
            return redirect('games')->with('message', 'The Game: ' . $game->name . ' was successfully edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if ($game->delete()) {
            return redirect('games')->with('message', 'The Game: ' . $game->name . ' was successfully deleted');
        }
    }

    public function search(Request $request)
    {
        $games = Game::names($request->q)->orderBy('id', 'DESC')->paginate(20);
        return view('games.search')->with('games', $games);
    }
}
