<?php

namespace App\Http\Controllers;

use App\GrandPrix;
use App\Points;
use App\Result;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ResultsController extends Controller
{
    //

    public function bet ($gp_id, $user_id) {
        $gp = GrandPrix::findOrFail($gp_id);
        $result = $gp->results()->where('user_id', $user_id)->first();
        if (!$result)
            $result = new Result();
        elseif (Input::get('type') == 'result') {
            $resultat = $gp->results()->where('type', 'result')->first();
            if ($resultat)
                return redirect()->back()->withResultErrors('Vous avez deja annonce des resultats');
            else
                $result = new Result();
        }

        $user = User::findOrFail($user_id);
        $result->score = 0;
        $result->type = Input::get('type');
        $result->pole = Input::get('pole');
        $result->position1 = Input::get('position1');
        $result->position2 = Input::get('position2');
        $result->position3 = Input::get('position3');
        $result->position4 = Input::get('position4');
        $result->position5 = Input::get('position5');
        $result->position6 = Input::get('position6');
        $result->position7 = Input::get('position7');
        $result->position8 = Input::get('position8');
        $result->position9 = Input::get('position9');
        $result->position10 = Input::get('position10');
        $result->user()->associate($user);
        $result->gp()->associate($gp);
        $result->save();

        if (Input::get('type') === "result")
            $this->_calculate_points($gp);

        return redirect()->back()->withValidation('Pari pris en compte !');
    }

    private function _proute ($result, $bet, $position) {
        dd($result->$position);
    }

    private function _calculate_points($gp) {

        $bets = $gp->results;
        $result = $gp->results->where('type', 'result')->first();

        foreach ($bets as $bet) {
            $point = new Points();
            $this->_proute($result, $bet, 'position1');
        }

        dd($result);
    }

    public function show ($gp_id) {
        $gp = GrandPrix::findOrFail($gp_id);
        $results = $gp->results;
        return view('results/show')->withResults($results)->withGp($gp);
    }
}
