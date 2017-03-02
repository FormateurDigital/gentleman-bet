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
        $gp_last = GrandPrix::where('date', '<', $today)->get();
        if (isset($gp_last))
            $gp_last = $gp_last->sortBy('date')->last();
        return view('welcome')->withGp($gp)->withLast($gp_last);
    }
}
