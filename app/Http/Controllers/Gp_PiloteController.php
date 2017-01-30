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

    public function create ($gp_id) {

        $gp = GrandPrix::findOrFail($gp_id);
        $season = $gp->season;
        $pilotes = Pilote::all();
        return view('/gp_pilotes/create')->withSeason($season->id)->withPilotes($pilotes);
    }

    public function store (Request $request) {

        $this->validate($request, [
            'pilote1' => 'required',
            'pilote2' => 'required',
            'pilote3' => 'required',
            'pilote4' => 'required',
            'pilote5' => 'required',
            'pilote6' => 'required',
            'pilote7' => 'required',
            'pilote8' => 'required',
            'pilote9' => 'required',
            'pilote10' => 'required',
        ]);

        $season = Season::findOrFail(Input::get('season'));
        $gps = $season->gp;
        foreach ($gps as $gp) {
            $gp->pilotes()->attach(Input::get('pilote1'));
            $gp->pilotes()->attach(Input::get('pilote2'));
            $gp->pilotes()->attach(Input::get('pilote3'));
            $gp->pilotes()->attach(Input::get('pilote4'));
            $gp->pilotes()->attach(Input::get('pilote5'));
            $gp->pilotes()->attach(Input::get('pilote6'));
            $gp->pilotes()->attach(Input::get('pilote7'));
            $gp->pilotes()->attach(Input::get('pilote8'));
            $gp->pilotes()->attach(Input::get('pilote9'));
            $gp->pilotes()->attach(Input::get('pilote10'));
            $gp->save();
        }
        return redirect()->action('HomeController@home');
    }
}
