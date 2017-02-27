<?php

namespace App\Http\Controllers;

use App\GrandPrix;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home () {
        if (\Auth::user() === null)
            return view ('home');

        $today = Carbon::now('Europe/Paris');
        $gp = GrandPrix::where('date', '>', $today)->orderBy('date')->first();
        return view('welcome')->withGp($gp);
    }
}
