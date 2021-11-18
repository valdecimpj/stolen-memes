<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $memes = Meme::latest()->paginate(9);
        return view('home.index', compact('memes'));
    }

    public function show(\App\Models\Meme $meme)
    {
        return view('meme.show', compact('meme'));
    }
}
