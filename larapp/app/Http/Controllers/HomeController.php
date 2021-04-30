<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Game;
use App\Models\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('dashboard-admin');
        } else if (Auth::user()->role == 'Editor') {
            return view('dashboard-editor');
        } else {
            return "Access Denied!";
        } 
    }

    public function welcome()
    {
        $sliders = Game::where('slider', 2)->get();
        $cats    = Category::all();
        $games   = Game::all();

        return view('welcome')->with('sliders', $sliders)
                              ->with('cats', $cats)
                              ->with('games', $games);
    }
}
