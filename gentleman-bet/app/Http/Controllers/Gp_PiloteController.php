<?php

namespace App\Http\Controllers;

use App\GrandPrix;
use App\Pilote;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Gp_PiloteController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function create ($gp_id) {

        $gp = GrandPrix::findOrFail($gp_id);
        $season = $gp->season;
        $pilotes = Pilote::all();
        return view('/gp_pilotes/create')->withSeason($season->id)->withPilotes($pilotes);
    }

    public function store (Request $request) {
        $season = Season::findOrFail(Input::get('season'));
        $gps = $season->gp;
        foreach ($gps as $gp) {
            for ($i = 1; $i <= Input::get('numbers') + 1; $i++) {
                if (Input::get('pilote' . $i) !== null) {
                    $gp->pilotes()->attach(Input::get('pilote' . $i));
                    $gp->save();
                }
            }
        }
        return redirect()->action('HomeController@home');
    }
}